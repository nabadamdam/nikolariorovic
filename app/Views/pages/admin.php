<?php
	if($_GET['page']=="Admin"):
?>
    <div class="container table-responsive table1A">   
        <h2 class="cursive-font primary-color regH">Delete&Update Products</h2>  
        <table class="table">
            <thead>
            <tr>
                <th class="colorFont">Name</th>
                <th class="colorFont">AlterName</th>
                <th class="colorFont">Description</th>
                <th class="colorFont">Price</th>
            </tr>
            </thead>
            <tbody id="tableProduct">
                <?php foreach($products as $item): ?>
                    <tr>
                        <td><?=$item->Naziv?></td>
                        <td><?=$item->SlikaAlt?></td>
                        <td><?=$item->Opis?></td>
                        <td><?=$item->Cena?></td>
                        <td><input type="button" class="buttonProdDelete btn btn-light" data-id="<?=$item->idProizvoda?>" value="Delete"/></td>
                        <td><a href="index.php?page=Update&idProd=<?=$item->idProizvoda?>" class="btn btn-light">Update</a></td>
                    </tr>
                <?php endforeach;?>
            </tbody>
        </table>
    </div>
    <div class="container table-responsive table1A">   
        <h2 class="cursive-font primary-color regH">Delete&Update Users</h2>  
        <table class="table">
            <thead>
            <tr>
                <th class="colorFont">Name</th>
                <th class="colorFont">Surename</th>
                <th class="colorFont">Email</th>
                <th class="colorFont">Username</th>
                <th class="colorFont">Role</th>
            </tr>
            </thead>
            <tbody id="tableUser">
                <?php foreach($users as $user): ?>
                    <tr>     
                        <td><?=$user->Ime?></td>
                        <td><?=$user->Prezime?></td>
                        <td><?=$user->Email?></td>
                        <td><?=$user->Username?></td>
                        <td><?=$user->NazivUloga?></td>
                        <td><input type="button" class="buttonUsrDelete btn btn-light" data-id="<?=$user->idKorisnika?>"value="Delete"/></td>
                        <td><a href="index.php?page=UpdateUser&idUsr=<?=$user->idKorisnika?>" class="btn btn-light">Update</a></td>
                    </tr>
                <?php endforeach;?>
            </tbody>
        </table>
    </div>
    <div class="container"> 
        <h2 class="cursive-font primary-color regH">Insert Products</h2>
        <form action="index.php?page=Insert" method="POST" enctype="multipart/form-data" onSubmit="return proveraPodatakaProduct();">
            <div class="row form-group">
                <div class="col-md-12">
                    <label for="date-start">Name</label>
                    <input type="text" name="name" id="nameProd" class="form-control"/>
                    <span id="errorNameProd"></span>
                </div>
            </div>
            <div class="row form-group">
                <div class="col-md-12">
                    <label for="date-start">PicturesSrc</label>
                    <input type="file" name="picsrc" id="picsrc" class="form-control" placeholder="app/assets/images/primer.jpg"/>
                    <span id="errorSrcProd"></span>
                </div>
            </div>
            <div class="row form-group">
                <div class="col-md-12">
                    <label for="date-start">AlterName</label>
                    <input type="text" name="picAlt" id="picAlt" class="form-control"/>
                    <span id="errorAltProd"></span>
                </div>
            </div>
            <div class="row form-group">
                <div class="col-md-12">
                    <label for="date-start">Description</label>
                    <input type="text" name="desc" id="desc" class="form-control"/>
                    <span id="errorDescProd"></span>
                </div>
            </div>
            <div class="row form-group">
                <div class="col-md-12">
                    <label for="date-start">Price</label>
                    <input type="text" name="price" id="price" class="form-control"/>
                    <span id="errorPriceProd"></span>
                </div>
            </div>
            <div class="row form-group">
                <div class="col-md-12">
                    <input type="submit" name="insert" class="btn btn-primary btn-block" value="Insert"/>
                </div>
            </div>
        </form>	
        <?php
            if(isset($_GET['textFormat'])){
                echo"The format of picture must be jpg!";
            }
            if(isset($_GET['textSize'])){
                echo"The size of picture must be less!";
            }
            if(isset($_GET['textEmpty'])){
                echo"Fields can't be empty!";
            }
        ?>
    </div>  
    <div class="container table-responsive table1A table1B">   
        <h2 class="cursive-font primary-color regH">Contact</h2>  
        <table class="table">
            <thead>
            <tr>
                <th class="colorFont">Name</th>
                <th class="colorFont">Email</th>
                <th class="colorFont">Question</th>
                <th class="colorFont">Date</th>
            </tr>
            </thead>
            <tbody id="tableContact">
                <?php foreach($questions as $question): ?>
                    <tr>
                        <td><?=$question->Ime?></td>
                        <td><?=$question->Email?></td>
                        <td><?=$question->Pitanje?></td>
                        <td><?=$question->Datum?></td>
                        <td><input type="button" class="buttonContactDelete btn btn-light" data-id="<?=$question->idPitanja?>"value="Delete"/></td>
                    </tr>
                <?php endforeach;?>
            </tbody>
        </table>
    </div>  
    <div class="container table-responsive table1A table1B">   
        <h2 class="cursive-font primary-color regH">Subscribe</h2>  
        <table class="table">
            <thead>
            <tr>
                <th class="colorFont">Id</th>
                <th class="colorFont">Email</th>
            </tr>
            </thead>
            <tbody id="tableSubscribe">
                <?php foreach($usersSub as $sub): ?>
                    <tr>
                        <td><?=$sub->Email?></td>
                        <td><input type="button" class="buttonSubscribeDelete btn btn-light" data-id="<?=$sub->idSub?>"value="Delete"/></td>
                    </tr>
                <?php endforeach;?>
            </tbody>
        </table>
    </div>              
<?php
	endif;
?>
<?php
	if($_GET['page']=="Update"):
?>
    <div class="container"> 
        <h2 class="cursive-font primary-color regH">Update Product</h2>
        <form action="index.php?page=ExecuteUpdate" method="POST">
          <div class="row form-group">
                <div class="col-md-12">
                    <input type="hidden" value="<?=$products->idProizvoda?>" name="idProd" class="form-control"/>
                </div>
            </div>
            <div class="row form-group">
                <div class="col-md-12">
                    <label for="date-start">Name</label>
                    <input type="text" value="<?=$products->Naziv?>" name="name" class="form-control"/>
                </div>
            </div>
            <div class="row form-group">
                <div class="col-md-12">
                    <label for="date-start">AlterName</label>
                    <input type="text" value="<?=$products->SlikaAlt?>" name="picAlt" class="form-control"/>
                </div>
            </div>
            <div class="row form-group">
                <div class="col-md-12">
                    <label for="date-start">Description</label>
                    <input type="text" value="<?=$products->Opis?>" name="desc" class="form-control"/>
                </div>
            </div>
            <div class="row form-group">
                <div class="col-md-12">
                    <label for="date-start">Price</label>
                    <input type="text" value="<?=$products->Cena?>" name="price" class="form-control"/>
                </div>
            </div>
            <div class="row form-group">
                <div class="col-md-12">
                    <input type="submit" name="update" class="btn btn-primary btn-block" value="Update"/>
                </div>
            </div>
        </form>	
    </div>  
<?php
	endif;
?>
<?php
	if($_GET['page']=="UpdateUser"):
?>
    <div class="container"> 
        <h2 class="cursive-font primary-color regH">Update User</h2>
        <form action="index.php?page=ExecuteUpdateUser" method="POST" onSubmit="return proveraPodatakaUser();">
            <div class="row form-group">
                <div class="col-md-12">
                    <input type="hidden" value="<?=$user->idKorisnika?>" name="idUsr" id="idUsr" class="form-control"/>
                </div>
                <div class="col-md-12">
                    <label for="date-start">Name</label>
                    <input type="text" value="<?=$user->Ime?>" name="nameUsr" id="idName" class="form-control"/>
                    <span id="errorNameUsr"></span>
                </div>
            </div>
            <div class="row form-group">
                <div class="col-md-12">
                    <label for="date-start">Surename</label>
                    <input type="text" value="<?=$user->Prezime?>" name="surnameUsr" id="idSur" class="form-control" placeholder="app/assets/images/primer.jpg"/>
                    <span id="errorSurnameUsr"></span>
                </div>
            </div>
            <div class="row form-group">
                <div class="col-md-12">
                    <label for="date-start">Email</label>
                    <input type="text" value="<?=$user->Email?>" name="emailUsr" id="idEmail" class="form-control"/>
                    <span id="errorEmailUsr"></span>
                </div>
            </div>
            <div class="row form-group">
                <div class="col-md-12">
                    <label for="date-start">Username</label>
                    <input type="text" value="<?=$user->Username?>" name="usernameUsr" id="idUsernameUsr" class="form-control"/>
                    <span id="errorUsernameUsr"></span>
                </div>
            </div>
            <div class="row form-group">
                <div class="col-md-12">
                    <label for="date-start">Role</label>
                    <select name="idUser" class="form-control">
                        <?php if($user->idUloga == 1):?>
                            <?php foreach($roles as $role): ?>
                                <?php if($role->idUloga == 1):?>
                                    <option value="<?=$role->idUloga?>" selected="selected"><?=$role->NazivUloga?></option>
                                <?php else:?>
                                    <option value="<?=$role->idUloga?>"><?=$role->NazivUloga?></option>
                                <?php endif; ?>
                            <?php endforeach;?>
                        <?php else:?>
                            <?php foreach($roles as $role): ?>
                                <?php if($role->idUloga == 2):?>
                                    <option value="<?=$role->idUloga?>" selected="selected"><?=$role->NazivUloga?></option>
                                <?php else:?>
                                    <option value="<?=$role->idUloga?>"><?=$role->NazivUloga?></option>
                                <?php endif; ?>
                            <?php endforeach;?>
                        <?php endif; ?>
                    </select>
                </div>
            </div>
            <div class="row form-group">
                <div class="col-md-12">
                    <input type="submit" name="updateUser" class="btn btn-primary btn-block" value="Update"/>
                </div>
            </div>
        </form>	
    </div>  
<?php
	endif;
?>