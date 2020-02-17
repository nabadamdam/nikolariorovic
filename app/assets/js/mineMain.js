$(document).ready(function() {
    //Start Delete For Subscribe
    $(document).on('click','.buttonSubscribeDelete', function(){
        var dataId = $(this).data('id');
        console.log(dataId);
        $.ajax({
            url: "index.php?page=DeleteSub",
            method: "POST",
            dataType: "json",
            data:{
                idSub : dataId
            },
            success: function(data){
                ponovniPrikazSubscribe();
                console.log(data);
            },
            error: function(xhr,status,msg){
                alert(xhr);
            }
        })
    });
    function ponovniPrikazSubscribe(){
        $.ajax({
            url: "index.php?page=adminSub",
            method: "GET",
            dataType: "json",
            success: function(userSubscribe){
                executeCodeSubscribe(userSubscribe);
                
            }
        })
    }
    function executeCodeSubscribe(userSub){
        var data = "";
        for(var item of userSub){
            data+=`
                <tr>
                    <td>${item.Email}</td>
                    <td><input type="button" class="buttonSubscribeDelete btn btn-light" data-id="${item.idSub}"value="Delete"/></td>
                </tr>
            `;
        }
        $("#tableSubscribe").html(data);
    }
    //End Delete For Subscribe
    //Start Delete For Products
    $(document).on('click','.buttonProdDelete', function(){
        var dataId = $(this).data('id');
        console.log(dataId);
        $.ajax({
            url: "index.php?page=Delete",
            method: "POST",
            dataType: "json",
            data:{
                idProd : dataId
            },
            success: function(data){
                ponovniPrikazProduct();
                console.log(data);
            },
            error: function(xhr,status,msg){
                alert(xhr);
            }
        })
    });
    function ponovniPrikazProduct(){
        $.ajax({
            url: "index.php?page=adminProd",
            method: "GET",
            dataType: "json",
            success: function(product){
                executeCodeProduct(product);
                
            }
        })
    }
    function executeCodeProduct(product){
        var data = "";
        for(var item of product){
            data+=`
                <tr>
                    <td>${item.Naziv}</td>
                    <td>${item.SlikaAlt}</td>
                    <td>${item.Opis}</td>
                    <td>${item.Cena}</td>
                    <td><input type="button" class="buttonProdDelete btn btn-light" data-id="${item.idProizvoda}" value="Delete"/></td>
                    <td><a href="index.php?page=Update&idProd=${item.idProizvoda}" class="btn btn-light">Update</a></td>
                </tr>
            `;
        }
        $("#tableProduct").html(data);
    }
    //End Delete For Products
    //Start Delete For User
    $(document).on('click','.buttonUsrDelete', function(){
        var dataId = $(this).data('id');
        console.log(dataId);
        $.ajax({
            url: "index.php?page=DeleteUser",
            method: "POST",
            dataType: "json",
            data:{
                idUsr : dataId
            },
            success: function(data){
                ponovniPrikaz();
                console.log(data);
            },
            error: function(xhr,status,msg){
                alert(xhr);
            }
        })
    });
    function ponovniPrikaz(){
        $.ajax({
            url: "index.php?page=adminUsr",
            method: "GET",
            dataType: "json",
            success: function(user){
                executeCode(user);
                
            }
        })
    }
    function executeCode(user){
        var data = "";
        for(var item of user){
            data+=`
                <tr>
                    <td>${item.Ime}</td>
                    <td>${item.Prezime}</td>
                    <td>${item.Email}</td>
                    <td>${item.Username}</td>
                    <td>${item.NazivUloga}</td>
                    <td><input type="button" class="buttonUsrDelete btn btn-light" data-id="${item.idKorisnika}" name="buttonUsrDelete"  value="Delete"/></td>
                    <td><a href="index.php?page=UpdateUser&idUsr=${item.idKorisnika}" class="btn btn-light">Update</a></td>
                </tr>
            `;
        }
        $("#tableUser").html(data);
    }
    //End Delete For User
    //Start Delete For Contact
    $(document).on('click','.buttonContactDelete', function(){
        var dataId = $(this).data('id');
        console.log(dataId);
        $.ajax({
            url: "index.php?page=DeleteContact",
            method: "POST",
            dataType: "json",
            data:{
                idContact : dataId
            },
            success: function(data){
                ponovniPrikazContact();
                console.log(data);
            },
            error: function(xhr,status,msg){
                alert(xhr);
            }
        })
    });
    function ponovniPrikazContact(){
        $.ajax({
            url: "index.php?page=ContactAdmin",
            method: "GET",
            dataType: "json",
            success: function(contact){
                executeCodeContact(contact);
                
            }
        })
    }
    function executeCodeContact(contact){
        var data = "";
        for(var item of contact){
            data+=`
                <tr>
                    <td>${item.Ime}</td>
                    <td>${item.Email}</td>
                    <td>${item.Pitanje}</td>
                    <td>${item.Datum}</td>
                    <td><input type="button" class="buttonContactDelete btn btn-light" data-id="${item.idPitanja}"value="Delete"/></td>
                </tr>
            `;
        }
        $("#tableContact").html(data);
    }
    //End Delete For Contact
    //Start Search For Product
    $("#searchMenu").keyup(function(){
        var value = $(this).val();
        if (value != "") {
            $.ajax({
                url: 'index.php?page=SearchProduct',
                method: 'POST',
                dataType:'json',
                data: {
                    value:value
        
                },
                success: function(data){
                    executeCodeProductSearchAndSort(data);
                },
                error: function(xhr,status,msg){
                    console.log(xhr);
                }
            });
        }else {
            $.ajax({
                url: 'index.php?page=SearchProduct',
                method: 'POST',
                dataType:'json',
                data: {
                    value:value,
                },
                success: function(data){
                    executeCodeProductSearchAndSort(data);
                },
                error: function(xhr,status,msg){
                    console.log(xhr);
                }
            });
        }
    });
    function executeCodeProductSearchAndSort(product){
        var data = "";
        for(var item of product){
            data+=`
                <div class="col-lg-4 col-md-4 col-sm-6">
                    <a href="index.php?page=onePicture&idPic=${item.idProizvoda}" class="fh5co-card-item">
                        <figure>
                            <img src="${item.SlikaSrc}" alt="${item.SlikaAlt}" class="img-responsive">
                        </figure>
                        <div class="fh5co-text">
                            <h2>${item.Naziv}</h2>
                            <p>${item.Opis}</p>
                            <p><span class="price cursive-font">$${item.Cena}</span></p>
                        </div>
                    </a>
                </div>
            `;
        }
        $("#productSearch").html(data);
    }
     //End Search For Product
     //Start SORT For Product
     $("#listSort").change(function(){
        var value = $(this).val();
        console.log(value);
        if (value != "") {
            $.ajax({
                url: 'index.php?page=SortProduct',
                method: 'POST',
                dataType:'json',
                data: {
                    value:value
        
                },
                success: function(data){
                    executeCodeProductSearchAndSort(data);
                },
                error: function(xhr,status,msg){
                    console.log(xhr);
                }
            });
        }
     });
     //END SORT For Product
    
});

function proveraPodataka(){
    console.log("radi");
    var ime = document.getElementById("Name").value;
    var prezime = document.getElementById("Surname").value;
    var email = document.getElementById("Email").value;
    var username = document.getElementById("Username").value;
    var sifra = document.getElementById("Password").value;
    
    var reIme= /^([A-Z][a-z]{2,11})+$/;
    var rePrezime = /^([A-Z][a-z]{2,15})+$/;
    var reEmail = /^\b[\w.-]+@[\w.-]+(\.[\w.-]+)*\.[A-Za-z]{2,4}\b$/;
    var reUser = /^[A-z]{4,16}[\d]+$/;
    var reSifra = /^[a-z]{4,16}[\d]+$/;
    var greske = [];
    if(!reIme.test(ime)){
        greske.push(ime);
        document.getElementById("Name").style.border ="1px solid red";
        document.getElementById("errorName").innerHTML ="You didn't enter a name well! </br></br>";
        document.getElementById("errorName").style.color = "red";
    }else{
        document.getElementById("Name").style.border ="1px solid green";
        document.getElementById("errorName").innerHTML= "";
    }
    if(!rePrezime.test(prezime)){
        greske.push(prezime);
        document.getElementById("Surname").style.border ="1px solid red";
        document.getElementById("errorSurname").innerHTML ="You didn't enter a surname well! </br></br>";
        document.getElementById("errorSurname").style.color = "red";
    }else{
        document.getElementById("Surname").style.border ="1px solid green";
        document.getElementById("errorSurname").innerHTML= "";
    }
    if(!reEmail.test(email)){
        greske.push(email);
        document.getElementById("Email").style.border ="1px solid red";
        document.getElementById("errorEmail").innerHTML ="You didn't enter a email well! </br></br>";
        document.getElementById("errorEmail").style.color = "red";
    }else{
        document.getElementById("Email").style.border ="1px solid green";
        document.getElementById("errorEmail").innerHTML= "";
    }
    if(!reUser.test(username)){
        greske.push(username);
        document.getElementById("Username").style.border ="1px solid red";
        document.getElementById("errorUsername").innerHTML ="You didn't enter a username well! </br></br>";
        document.getElementById("errorUsername").style.color = "red";
    }else{
        document.getElementById("Username").style.border ="1px solid green";
        document.getElementById("errorUsername").innerHTML= "";
    }
    if(!reSifra.test(sifra)){
        greske.push(sifra);
        document.getElementById("Password").style.border ="1px solid red";
        document.getElementById("errorPassword").innerHTML ="You didn't enter a password well! </br></br>";
        document.getElementById("errorPassword").style.color = "red";
    }else{
        document.getElementById("Password").style.border ="1px solid green";
        document.getElementById("errorPassword").innerHTML= "";
    }
    if(greske.length == 0){
        return true;
    }else{
        return false;
    }
}
function proveraPodatakaContact(){
    var ime = document.getElementById("name").value;
    var email = document.getElementById("email").value;
    var message = document.getElementById("message").value;
    var reIme= /^([A-Z][a-z]{2,11})+$/;
    var reEmail = /^\b[\w.-]+@[\w.-]+(\.[\w.-]+)*\.[A-Za-z]{2,4}\b$/;
    var reMessage = /^[A-Za-z0-9.]{5,1000}$/;
    var greske = [];
    console.log(message);
    if(!reIme.test(ime)){
        greske.push(ime);
        document.getElementById("name").style.border ="1px solid red";
        document.getElementById("errorName1").innerHTML ="You didn't enter a name well! </br></br>";
        document.getElementById("errorName1").style.color = "red";
    }else{
        document.getElementById("name").style.border ="1px solid green";
        document.getElementById("errorName1").innerHTML= "";
    }
    if(!reMessage.test(message)){
        greske.push(message);
        document.getElementById("message").style.border ="1px solid red";
        document.getElementById("errorMessage").innerHTML ="You didn't enter a message well! </br></br>";
        document.getElementById("errorMessage").style.color = "red";
    }else{
        document.getElementById("message").style.border ="1px solid green";
        document.getElementById("errorMessage").innerHTML= "";
    }
    if(!reEmail.test(email)){
        greske.push(email);
        document.getElementById("email").style.border ="1px solid red";
        document.getElementById("errorEmail1").innerHTML ="You didn't enter a email well! </br></br>";
        document.getElementById("errorEmail1").style.color = "red";
    }else{
        document.getElementById("email").style.border ="1px solid green";
        document.getElementById("errorEmail1").innerHTML= "";
    }
    console.log(greske);
    if(greske.length == 0){
        return true;
    }else{
        return false;
    }
}
function proveraPodatakaLogIn(){
    var email = document.getElementById("email").value;
    var sifra = document.getElementById("password").value;
    var reEmail = /^\b[\w.-]+@[\w.-]+(\.[\w.-]+)*\.[A-Za-z]{2,4}\b$/;
    var reSifra = /^[a-z]{4,16}[\d]+$/;
    var greske = [];
    if(!reEmail.test(email)){
        greske.push(email);
        document.getElementById("email").style.border ="1px solid red";
        document.getElementById("errorEmail2").innerHTML ="You didn't enter a email well! </br></br>";
        document.getElementById("errorEmail2").style.color = "red";
    }else{
        document.getElementById("email").style.border ="1px solid green";
        document.getElementById("errorEmail2").innerHTML= "";
    }
    if(!reSifra.test(sifra)){
        greske.push(sifra);
        document.getElementById("password").style.border ="1px solid red";
        document.getElementById("errorPassword2").innerHTML ="You didn't enter a password well! </br></br>";
        document.getElementById("errorPassword2").style.color = "red";
    }else{
        document.getElementById("password").style.border ="1px solid green";
        document.getElementById("errorPassword2").innerHTML= "";
    }
    if(greske.length == 0){
        return true;
    }else{
        return false;
    }
}
    
function proveraSubscribe(){
    var email = document.getElementById("emailSub").value;
    var reEmail = /^\b[\w.-]+@[\w.-]+(\.[\w.-]+)*\.[A-Za-z]{2,4}\b$/;
    var greske = [];
    if(!reEmail.test(email)){
        greske.push(email);
        document.getElementById("errorEmail3").innerHTML ="You didn't enter a email well! </br></br>";
        document.getElementById("errorEmail3").style.color = "red";
    }else{
        document.getElementById("emailSub").style.border ="1px solid green";
        document.getElementById("errorEmail3").innerHTML= "";
    }
    if(greske.length == 0){
        return true;
    }else{
        return false;
    }
}
function proveraPodatakaProduct(){
    var ime = document.getElementById("nameProd").value;
    var picSrc = document.getElementById("picsrc");
    var picAlt = document.getElementById("picAlt").value;
    var desc = document.getElementById("desc").value;
    var price = document.getElementById("price").value;
    var greske = [];
    if(ime==""){
        greske.push(ime);
        document.getElementById("nameProd").style.border ="1px solid red";
        document.getElementById("errorNameProd").innerHTML ="This field can't be empty!</br></br>";
        document.getElementById("errorNameProd").style.color = "red";
    }else{
        document.getElementById("nameProd").style.border ="1px solid green";
        document.getElementById("errorNameProd").innerHTML= "";
    }
    
    if(picAlt==""){
        greske.push(picAlt);
        document.getElementById("picAlt").style.border ="1px solid red";
        document.getElementById("errorAltProd").innerHTML ="This field can't be empty!</br></br>";
        document.getElementById("errorAltProd").style.color = "red";
    }else{
        document.getElementById("picAlt").style.border ="1px solid green";
        document.getElementById("errorAltProd").innerHTML= "";
    }
    if(desc==""){
        greske.push(desc);
        document.getElementById("desc").style.border ="1px solid red";
        document.getElementById("errorDescProd").innerHTML ="This field can't be empty!</br></br>";
        document.getElementById("errorDescProd").style.color = "red";
    }else{
        document.getElementById("desc").style.border ="1px solid green";
        document.getElementById("errorDescProd").innerHTML= "";
    }
    if(price==""){
        greske.push(price);
        document.getElementById("price").style.border ="1px solid red";
        document.getElementById("errorPriceProd").innerHTML ="This field can't be empty!</br></br>";
        document.getElementById("errorPriceProd").style.color = "red";
    }else{
        document.getElementById("price").style.border ="1px solid green";
        document.getElementById("errorPriceProd").innerHTML= "";
    }
    if(picSrc.value.length == 0 ){
        greske.push(picSrc);
        document.getElementById("picsrc").style.border ="1px solid red";
        document.getElementById("errorSrcProd").innerHTML ="This field can't be empty!</br></br>";
        document.getElementById("errorSrcProd").style.color = "red";
    }else{
        document.getElementById("picsrc").style.border ="1px solid green";
        document.getElementById("errorSrcProd").innerHTML= "";
    }
    if(greske.length == 0){
        return true;
    }else{
        return false;
    }
}
function proveraPodatakaUser(){
    var ime = document.getElementById("idName").value;
    var prezime = document.getElementById("idSur").value;
    var email = document.getElementById("idEmail").value;
    var username = document.getElementById("idUsernameUsr").value;

    var reIme= /^([A-Z][a-z]{2,11})+$/;
    var rePrezime = /^([A-Z][a-z]{2,15})+$/;
    var reEmail = /^\b[\w.-]+@[\w.-]+(\.[\w.-]+)*\.[A-Za-z]{2,4}\b$/;
    var reUser = /^[A-z]{4,16}[\d]+$/;
    var greske = [];
    if(!reIme.test(ime)){
        greske.push(ime);
        document.getElementById("idName").style.border ="1px solid red";
        document.getElementById("errorNameUsr").innerHTML ="You didn't enter a name well! </br></br>";
        document.getElementById("errorNameUsr").style.color = "red";
    }else{
        document.getElementById("idName").style.border ="1px solid green";
        document.getElementById("errorNameUsr").innerHTML= "";
    }
    if(!rePrezime.test(prezime)){
        greske.push(prezime);
        document.getElementById("idSur").style.border ="1px solid red";
        document.getElementById("errorSurnameUsr").innerHTML ="You didn't enter a surname well! </br></br>";
        document.getElementById("errorSurnameUsr").style.color = "red";
    }else{
        document.getElementById("idSur").style.border ="1px solid green";
        document.getElementById("errorSurnameUsr").innerHTML= "";
    }
    if(!reEmail.test(email)){
        greske.push(email);
        document.getElementById("idEmail").style.border ="1px solid red";
        document.getElementById("errorEmailUsr").innerHTML ="You didn't enter a email well! </br></br>";
        document.getElementById("errorEmailUsr").style.color = "red";
    }else{
        document.getElementById("idEmail").style.border ="1px solid green";
        document.getElementById("errorEmailUsr").innerHTML= "";
    }
    if(!reUser.test(username)){
        greske.push(username);
        document.getElementById("idUsernameUsr").style.border ="1px solid red";
        document.getElementById("errorUsernameUsr").innerHTML ="You didn't enter a username well! </br></br>";
        document.getElementById("errorUsernameUsr").style.color = "red";
    }else{
        document.getElementById("idUsernameUsr").style.border ="1px solid green";
        document.getElementById("errorUsernameUsr").innerHTML= "";
    }
    if(greske.length == 0){
        return true;
    }else{
        return false;
    }


}