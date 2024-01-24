<?php
    spl_autoload_register(function($classe){
        require "../db/".$classe.".php";
    });
    include_once '../library/Format.php';
    include_once '../library/Session.php';
    include_once '../classes/Categories.php';


    $dao = new DataBase();
    $fm = new Format();
    $cat = new Categories();
    $response = array();


if($_SERVER['REQUEST_METHOD']=='POST')
{
    if(isset($_POST['nom']) && !empty($_POST['nom']) && isset($_POST['description']) && !empty($_POST['description']))
    {
          $cat->setNom($fm->validation($_POST['nom']));
          $cat->setDescription($fm->validation($_POST['description']));

          $resultat = $dao->addCategories($cat);
          if ($resultat){
              //echo "Catagories Ajouté";
              $msg = "Catagories Ajouté";
          }
          else{
              echo  "erreur";
          }
    }

}


if (isset($_GET['del']) && !empty($_GET['del']))
{
    $id = $_GET['del'];
    $dao->deleteOneCategories($id);
}
?>

<?php require_once 'header.php' ?>
    <div class="wrapper">
        <nav id="sidebar" class="sidebar">
            <a class="sidebar-brand" href="index.php">
                <i class="las la-shopping-bag" style="font-size:30px"></i>
                B-Online
            </a>
            <div class="sidebar-content">
                <div class="sidebar-user">
                    <img src="" class="img-fluid rounded-circle mb-2"/>
                    <div class="font-weight-bold"></div>
                    <small></small><br>
                    <small class="badge badge-primary">Administateur</small>
                </div>

                <ul class="sidebar-nav">
                    <li class="sidebar-header">
                        Main
                    </li>
                    <li class="sidebar-item active">
                        <a href="#dashboards" data-toggle="collapse" class="sidebar-link">
                            <i class="align-middle mr-2 fas fa-fw fa-home"></i>
                            <span class="align-middle">Dashboards</span>
                        </a>
                        <ul id="dashboards" class="sidebar-dropdown list-unstyled collapse show" data-parent="#sidebar">
                            <li class="sidebar-item active">
                                <a class="sidebar-link" href="index.php">Tableau de Bord</a>
                            </li>
                        </ul>
                    </li>

                    <?php include('admin.php') ?>


                </ul>
            </div>
        </nav>

        <div class="main">
            <nav class="navbar navbar-expand navbar-theme">
                <a class="sidebar-toggle d-flex mr-2">
                    <i class="hamburger align-self-center"></i>
                </a>

                <form class="form-inline d-none d-sm-inline-block">
                    <input class="form-control form-control-lite" type="text" placeholder="Search projects...">
                </form>

                <div class="navbar-collapse collapse">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item dropdown ml-lg-2">
                            <a class="nav-link dropdown-toggle position-relative" href="#" id="userDropdown" data-toggle="dropdown">
                                <i class="align-middle fas fa-cog"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                                <a class="dropdown-item" href=""><i class="align-middle mr-1 fas fa-fw fa-user"></i>Profil</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="?deco=logout">
                                    <i class="align-middle mr-1 fas fa-fw fa-arrow-alt-circle-right"></i>
                                    Deconnexion</a>
                            </div>
                        </li>
                    </ul>
                </div>

            </nav>

            <main class="content">
                <div class="container-fluid">

                    <div class="header">
                        <h1 class="header-title">
                            Bienvenu,
                        </h1>
                        <p class="header-subtitle">Lorem</p>
                    </div>

                    <div class="row">
                        <div class="col-12 col-md-12 col-xxl-4 d-flex">

                            <div class="card flex-fill w-100">
                                <div class="card-header">
                                    <h2 class="card-title mb-0">Categories</h2>
                                    <button class="btn btn-pill btn-primary float-right" type="button" data-toggle="modal" data-target="#defaultModalPrimary" style="margin-top: -25px">Ajouter</button>
                                </div>

                            </div>
                        </div>

                    </div>


                    <div class="row">
                        <div class="col-12 col-md-12 col-xxl-4 d-flex">
                            <div class="card flex-fill w-100">
                                <div class="card-header">
                                    <h5 class="card-title mb-0">Resultats</h5>

                                </div>
                                <div class="card-body">
                                    <div id="datatables-basic_wrapper" class="dataTables_wrapper dt-bootstrap4">
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <table id="datatables-basic" class="table table-striped dataTable dtr-inline" style="width: 100%;" role="grid" aria-describedby="datatables-basic_info">
                                                    <thead>
                                                    <tr role="row">
                                                        <td>Numero</td>
                                                        <td>Nom Categories</td>
                                                        <td>Description Categories</td>
                                                        <td>Actions</td>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    <?php

                                                    $row = $dao->getallCategories();
                                                    $count = 1;

                                                    if ($row)
                                                    {
                                                        foreach ($row as $document)
                                                        {
                                                            //var_dump($document['description']);
                                                            ?>
                                                            <tr role="row" class="odd">
                                                                <td><?=$count?></td>
                                                                <td><?=$document->nom_cat?></td>
                                                                <td><p style="overflow:auto;">
                                                                        <?=$document->description_cat?>
                                                                    </p>
                                                                </td>

                                                                <td>
                                                                    <a href="?edit=<?=$document->id?>" type="button" class="btn btn-link">
                                                                        <i class="fas fa-edit"></i>
                                                                    </a>
                                                                    <a href="?del=<?=$document->id ?>">
                                                                        <i class="fas fa-trash-alt"></i>
                                                                    </a>

                                                                </td>
                                                            </tr>
                                                            <?php
                                                            $count++;
                                                        }
                                                    }?>
                                                    </tbody>
                                                    <tfoot>
                                                        <tr role="row">
                                                            <td>Numero</td>
                                                            <td>Nom Categories</td>
                                                            <td>Description Categories</td>
                                                            <td>Actions</td>
                                                        </tr>
                                                    </tfoot>
                                                </table>
                                            </div>
                                        </div>
                                </div>
                                </div>
                        </div>
                        </div>
                    </div>

                    <div class="row">

                        <div class="modal fade" id="defaultModalPrimary" tabindex="-1" aria-hidden="true" style="display: none;">
                                <div class="modal-dialog" role="document">
<!--                                    <div class="alert alert-success" role="alert">-->
<!--                                        --><?php //if (isset($msg) && !empty($msg))
//                                        {
//                                            echo $msg;
//                                        }
//                                        ?>
<!--                                    </div>-->
                                <form method="post" action="" enctype="multipart/form-data">
                                    @csrf
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h3 class="text-center">Ajouter une categories</h3>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">×</span>
                                            </button>
                                        </div>
                                        <div class="modal-body m-3">
                                            <div class="form-group row">
                                                <label class="col-form-label col-sm-2 text-sm-right">Nom Categories</label>
                                                <div class="col-sm-10">
                                                    <input type="text" id="nom" name="nom" class="form-control" placeholder="Nom Categories" required>

                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-form-label col-sm-2 text-sm-right">Description Categories</label>
                                                <div class="col-sm-10">
                                                    <textarea class="form-control" id="description" placeholder="Description Categories" name="description" rows="3" required></textarea>

                                                </div>
                                            </div>






                                            <div class="modal-footer">
                                                <button type="submit" class="btn btn-primary">Save</button>
                                                <button type="reset" class="btn btn-danger" data-dismiss="modal">Close</button>
                                            </div>
                                        </div>
                                </form>
                            </div>
                        </div>

                    </div>
            </main>

        </div>

    </div>
<?php require_once  'footer.php' ?>