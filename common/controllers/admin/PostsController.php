<?php

class PostsController extends Controller
{
    public function __construct()
    {
        if (!$this->loggedIn()) {
            header('Location: index.php?c=login');
        }
    }

    /*
     *
     * INDEX VIEW
     *
     */
    public function index()
    {
        $viewData = array();

        $search = (isset($_GET['search'])) ? htmlspecialchars(trim($_GET['search'])) : '';
        
        $postsCollection = new PostsCollection();

        //В тази променлива пазим броя резултати които искаме да върне заявката
        //$pageResults = (isset($_GET['perPage']))? (int)$_GET['perPage'] : 5;
        $pageResults = (isset($_GET['perPage'])) ? (int)$_GET['perPage'] : 0;
        switch ($pageResults) {
            case 1:
                $pageResults = 1;
                break;
            case 5:
                $pageResults = 5;
                break;
            case 10:
                $pageResults = 10;
                break;
            default:
                $pageResults = 5;
        }

        //Филтър за подреждане по
        $orderBy = (isset($_GET['orderBy'])) ? (int)$_GET['orderBy'] : 0;
        switch ($orderBy) {
            case 1:
                $order = array('date', 'DESC');
                break;
            case 2:
                $order = array('date', 'ASC');
                break;
            case 3:
                $order = array('title', 'ASC');
                break;
            case 4:
                $order = array('title', 'DESC');
                break;
            default:
                $order = array('date', 'DESC');
        }


        //В променливата $page присвояваме гет параметъра, който се придава. Ако няма гет параметър то тогава слагаме 1.
        $page = (isset($_GET['page']) && (int)$_GET['page'] > 0)? (int)$_GET['page'] : 1;

        //В тази променлива изчисляваме от кой точно резултат да започне броенето в заявката.
        $offset = ($page-1)*$pageResults;

        $posts = $postsCollection->get(array(), $offset, $pageResults, $search, $order, 'title');

        $totalRows = count($postsCollection->get(array(), -1, 0, $search, $order, 'title'));
        $totalRows = ($totalRows == 0)? 1 : $totalRows;

        $paginator = new Pagination();
        $paginator->setPerPage($pageResults);
        $paginator->setTotalRows($totalRows);
        $paginator->setBaseUrl("index.php?c=posts&perPage={$pageResults}&orderBy={$orderBy}&search={$search}");

        $viewData['posts']       = $posts;
        $viewData['paginator']   = $paginator;
        $viewData['pageResults'] = $pageResults;
        $viewData['search']      = $search;
        $viewData['orderBy']     = $orderBy;

        $this->loadView('posts/list.php', $viewData);
    }

    /*
     *
     * INSERT FUNCTION
     *
     */
    public function insert()
    {
        $viewData = array();

        $errors = array();

        $categoriesCollection = new CategoriesCollection();
        $categories = $categoriesCollection->get(1, NULL, NULL, NULL, NULL, NULL);
        $authorCollection = new AdminsCollection();
        $authors = $authorCollection->get(1, NULL, NULL, NULL, NULL, NULL);

        $data = array(
            'title'          => '',
            'description'    => '',
            'categoryName'   => '',
            'authorName'     => '',
            'date'           => '',
            'content'        => '',
            'image'          => '',
        );

        if (isset($_POST['submit'])) {

            $data = array(
                'title'         => htmlspecialchars(trim($_POST['title'])),
                'description'   => htmlspecialchars(trim($_POST['description'])),
                'categoryName'  => htmlspecialchars(trim($_POST['categoryName'])),
                'authorName'    => htmlspecialchars(trim($_POST['authorName'])),
                'date'          => htmlspecialchars(trim($_POST['date'])),
                'content'       => htmlspecialchars(trim($_POST['content'])),
            );

            $errors = $this->validate($data);

            $imageErrors = array();
            if (isset($_FILES['image'])) {
                $imageName = $_FILES['image']['name'];

                $imageType = $_FILES['image']['type'];
                $imageSize = $_FILES['image']['size'];
                $imagePath = $_FILES['image']['tmp_name'];
                $extension = strtolower(end(explode('/', $imageType)));
                $imageName = sha1(sha1(time())+sha1($imageName)).'.'.$extension;
                $allow = array('gif', 'jpg', 'jpeg', 'png');

                if (!in_array($extension, $allow)) {
                    $imageErrors['extension'] = 'Wrong extension';
                }
                if ($imageSize > 1000000) {
                    $imageErrors['size'] = 'Image is too big!';
                }
            }

            if (empty($errors) && empty($imageErrors)) {
                if (isset($_FILES['image'])) {
                    $data['image'] = $imageName;
                }
                $entity = new PostEntity();
                $entity->init($data);
                $postsCollection = new PostsCollection();
                $postsCollection->save($entity);

                if (isset($_FILES['image'])) {
                    move_uploaded_file($imagePath, __DIR__.'/../../../admin/uploads/postsImages/thumbnails/' . $imageName);
                }

                $_SESSION['message']['success'] = ' 1 post CREATED';
                header('Location: index.php?c=posts');
                die;
            }
        }

        $viewData['data']       = $data;
        $viewData['errors']     = $errors;
        $viewData['categories'] = $categories;
        $viewData['authors']    = $authors;

        $this->loadView('posts/insert.php', $viewData);
    }

    /*
     *
     * UPDATE FUNCTION
     *
     */
    public function update()
    {
        $viewData = array();

        if (!isset($_GET['id'])) {
            header('Location: index.php?c=posts');
            die;
        }

        $postsCollection = new PostsCollection();
        $post = $postsCollection->getOne($_GET['id']);

        $categoriesCollection = new CategoriesCollection();
        $categories = $categoriesCollection->get($_GET['id'], NULL, NULL, NULL, NULL, NULL);

        $authorCollection = new AdminsCollection();
        $authors = $authorCollection->get($_GET['id'], NULL, NULL, NULL, NULL, NULL);


        if (empty($post)) {
            header('Location: index.php?c=posts');
            die;
        }

        $data = array(
            'id'             => $post->getId(),
            'title'          => $post->getTitle(),
            'description'    => $post->getDescription(),
            'categoryName'   => $post->getCategoryName(),
            'authorName'     => $post->getAuthorName(),
            'date'           => $post->getDate(),
            'content'        => htmlspecialchars_decode($post->getContent()),
            'image'          => $post->getImage(),
        );

        $errors = array();

        if (isset($_POST['submit'])) {
            $data = array(
                'id'            => htmlspecialchars(trim($_GET['id'])),
                'title'         => htmlspecialchars(trim($_POST['title'])),
                'description'   => htmlspecialchars(trim($_POST['description'])),
                'categoryName'  => htmlspecialchars(trim($_POST['categoryName'])),
                'authorName'    => htmlspecialchars(trim($_POST['authorName'])),
                'date'          => htmlspecialchars(trim($_POST['date'])),
                'content'       => htmlspecialchars(trim($_POST['content'])),
                'image'         => $post->getImage(),
            );

            $errors = $this->validateUpdate($data);

            if (empty($errors)) {

                $entity = new PostEntity();
                $entity->init($data);
                $postsCollection->save($entity);
                $_SESSION['message']['success'] = ' 1 post CHANGED';
                header('Location: index.php?c=posts');
                die;
            }
        }

        $viewData['data']       = $data;
        $viewData['errors']     = $errors;
        $viewData['categories'] = $categories;
        $viewData['authors']    = $authors;

        $this->loadView('posts/update.php', $viewData);
    }

    /*
     *
     * DELETE FUNCTION
     *
     */
    public function delete()
    {
        if(!isset($_GET['id'])) {
            $_SESSION['message']['warning'] = ' Sorry, but something went wrong!';
            header('Location: index.php?c=posts');
            die;
        }

        $postsCollection = new PostsCollection();
        $post = $postsCollection->getOne($_GET['id']);

        if(is_null($post->getId())) {
            $_SESSION['message']['warning'] = ' Sorry, but something went wrong!';
            header('Location: index.php?c=posts');
            die;
        }

        $postsCollection->delete($post->getId());

        //delete image for tours
        unlink(__DIR__.'/../../../admin/uploads/postsImages/thumbnails/'.$post->getImage());

        $_SESSION['message']['success'] = ' 1 post DELETED';
        header('Location: index.php?c=posts');
        die;
    }

    /*
     *
     * VALIDATE FUNCTION
     *
     */
    protected function validate($data)
    {
        $errors = array();

        if(strlen(trim($data['title'])) < 3 || strlen(trim($data['title'])) > 255) {
            $errors['title'] = 'Invalid title length (3 symbols required)';
        }
        if(strlen(trim($data['description'])) < 8 || strlen(trim($data['description'])) > 255) {
            $errors['description'] = 'Invalid description length (8 symbols required)';
        }
        if(strlen(trim($data['categoryName'])) == 0) {
            $errors['categoryName'] = 'Invalid category';
        }
        if(strlen(trim($data['authorName'])) == 0) {
            $errors['authorName'] = 'Invalid author';
        }
        if(strlen(trim($data['date'])) == 0) {
            $errors['date'] = 'Invalid date';
        }
        if(strlen(trim($data['content'])) < 15) {
            $errors['content'] = '<h1 style="text-align: center;"><b style="font-size: larger; color: red;">Invalid content length</b></h1>';
        }
        if($_FILES['image']['name'] < 1) {
            $errors['image'] = 'Invalid thumbnail';
        }

        return $errors;
    }

    /*
     *
     * VALIDATE UPDATE FUNCTION
     *
     */
    protected function validateUpdate($data)
    {
        $errors = array();

        if(strlen(trim($data['title'])) < 3 || strlen(trim($data['title'])) > 255) {
            $errors['title'] = 'Invalid title length (3 symbols required)';
        }
        if(strlen(trim($data['description'])) < 8 || strlen(trim($data['description'])) > 255) {
            $errors['description'] = 'Invalid description length (8 symbols required)';
        }
        if(strlen(trim($data['categoryName'])) == 0) {
            $errors['categoryName'] = 'Invalid category';
        }
        if(strlen(trim($data['authorName'])) == 0) {
            $errors['authorName'] = 'Invalid author';
        }
        if(strlen(trim($data['date'])) == 0) {
            $errors['date'] = 'Invalid date';
        }
        if(strlen(trim($data['content'])) < 15) {
            $errors['content'] = '<h1 style="text-align: center;"><b style="font-size: larger; color: red;">Invalid content length</b></h1>';
        }

        return $errors;
    }

    /*
     *
     * PREVIEW FUNCTION
     *
     */
    public function preview()
    {
        $viewData = array();

        if (!isset($_GET['id'])) {
            header('Location: index.php?c=posts');
            die;
        }

        $postsCollection = new PostsCollection();
        $post = $postsCollection->getOne($_GET['id']);

        if (empty($post)) {
            header('Location: index.php?c=posts');
            die;
        }

        $viewData['post'] = $post;

        $this->loadView('posts/preview.php', $viewData);
    }

    /*
     *
     * POSTS IMAGE UPLOADER
     *
     */
    public function postImages()
    {
        $viewData = array();

        if (!isset($_GET['id'])) {
            header('Location: index.php?c=posts');
        }

        $postsCollection = new PostsCollection();
        $where = array('t.id' => (int)$_GET['id']);
        $post = $postsCollection->getImages3($where);

        if (empty($post)) {
            header('Location: index.php?c=posts');
            die;
        }


        $where = array('posts_id' => $_GET['id']);
        $postsImageCollection = new PostImagesCollection();
        $images = $postsImageCollection->getImages($where);


        $imageErrors = array();

        if (isset($_FILES['image'])) {
            $imageName = $_FILES['image']['name'];

            $imageType = $_FILES['image']['type'];
            $imageSize = $_FILES['image']['size'];
            $imagePath = $_FILES['image']['tmp_name'];
            $extension = strtolower(end(explode('/', $imageType)));
            $imageName = sha1(sha1(time())+sha1($imageName)).'.'.$extension;
            $allow = array('gif', 'jpg', 'jpeg', 'png');

            if (!in_array($extension, $allow)) {
                $imageErrors['extension'] = 'Wrong extension';
            }
            if ($imageSize > 1000000) {
                $imageErrors['size'] = 'Image is too big!';
            }

            if (empty($imageErrors)) {
                $data = array(
                    'posts_id' => $_GET['id'],
                    'image'    => $imageName
                );


                $entity = new PostImageEntity();
                $entity->init($data);
                $postsImageCollection->save($entity);
                move_uploaded_file($imagePath, __DIR__.'/../../../admin/uploads/postsImages/' . $imageName);
                header("Location: index.php?c=posts&id={$_GET['id']}");
            }

        }
        $viewData['images'] = $images;

        $this->loadView('posts/insert.php', $viewData);
    }

    public function postImageDelete()
    {
        //proverka dali ima podadeno ID
        if (!isset($_GET['id'])) {
            header('Location: index.php?c=tours');
        }

        //Proverka dali ima Image s takova id
        $toursImagesCollection = new TourImagesCollection();
        $image = $toursImagesCollection->getOne($_GET['id']);
        if(empty($image)) {
            header('Location: index.php?c=tours');
        }

        //Iztriwane na Image ot bazata kato zapis
        $toursImagesCollection->delete((int)$_GET['id']);

        //Iztrivane na Image Fizicheski
        unlink('uploads/'.$image->getImage());
        header("Location: index.php?c=tours&m=tourImages&id={$image->getToursId()}");
    }

}