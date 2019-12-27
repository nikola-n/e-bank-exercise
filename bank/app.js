$(document).ready(function(){
    $("#register").click(function(e){
        e.preventDefault();
        let email = $("#email").val();
        let password = $("#password").val();
        // dokolku inputite se prazni se printaat errori vo sprotivno prakame ajax povik 
        if(email == "" || email == undefined || email == null){
            showError("Email field can not be empty");
        }else if(password == "" || password == undefined || password == null  || password.length < 6){
            showError("Password field must be at least 6 characters long")
        }else{
            let dataToSend = {
                email: email,
                password: password
            }
    
            $.post("registerAjax.php", dataToSend)
            .then(function(data){
                data = JSON.parse(data);
                if(data.error){
                    showError(data.error);
                }else if(data.success){
                    // dokolku e uspeshna registracijata pojavuvame poraka za uspeshna registracija i gi praznime inputite
                    showSuccess(data.success);
                    $("#email").val("");
                    $("#password").val("");
                }else{
                    console.log(data);
                    // ovde treba da se slucuva nesto posle registracija na profilot 
                }
            })
        }
        
    });

    $("#login").click(function(e){
        e.preventDefault();
        let email = $("#email").val();
        let password = $("#password").val();
        if(email == "" || email == undefined || email == null){
            showError("Email field can not be empty");
        }else if(password == "" || password == undefined || password == null){
            showError("Password field can not be empty")
        }else{
            let dataToSend = {
                email: email,
                password: password
            }
    
            $.post("api/frontend/loginAjax.php", dataToSend)
                .then(function(data){
                    data = JSON.parse(data);
                    if(data.error){
                        showError(data.error);
                    }else if(data.user){
                        // ovde pojavuvame poraka deka samo admini moze da re logiraat sega, vo idnina vo ovoj del treba da se slucuva nesto so profilot na user-ot
                        showError(data.user);
                        $("#email").val("");
                        $("#password").val("");
                    }else{
                        let container = $(".container");
                        // go prebrisuvame celiot html, odnosno davame html za admin
                            container.html(`
                                    <div class="row">
                                    <div class="col-md-8 col-md-offset-2">
                                        <table class="table table-striped table-bordered">
                                            <thead>
                                                <th>ID</th>
                                                <th>email</th>
                                                <th>name</th>
                                                <th>resident</th>
                                                <th>account number</th>
                                                <th>action</th>
                                            </thead>
                                            <tbody id="table">
                                                
                                            </tbody>
                                        </table>
                                    </div>
                                </div>            
                            `);
                        let table = $("#table");
                        // za sekoj user od nizata so useri kreirame po edno tr so negovite podatoci
                        data.map(function(user){
                            // vo zavisnost od toa dali user-ot e kompanija ili fizicko lice pokazuvame razlicni podatoci
                            let name = user.companyName ? user.companyName : user.firstName + " " + user.fatherName + " " + user.lastName;
                            // vo zavisnost od toa dali user-ot e active ili ne pokazuvame razlicno kopce
                            let action = user.active == 1 ? `<button class="btn btn-danger" id="deactivate">deactivate</button>` : `<button class="btn btn-success" id="activate">Activate</button>`
                            // na sekoe tr mu zadavame id ednakvo na id od baza na user-ot
                            table.append(
                                `<tr id="${user.id}">
                                    <td>${user.id}</td>
                                    <td>${user.email}</td>
                                    <td>${name}</td>
                                    <td>${user.isResident}</td>
                                    <td>${user.accountNum}</td>
                                    <td>${action}</td>
                                </tr>`
                            )
                        })
                    }
                })
        }
        

    })

    $(document).on("click", "#activate", function(e){
        // koga ke se klikne na activate kopceto prakame povik za aktiviranje na user-ot
        e.preventDefault();
        let id = $(this).parent().siblings().eq(0).text();
        let dataToSend = {
            id: id
        }
        $.post("adminAjax.php", dataToSend)
        .then(function(data){
            data = JSON.parse(data);
            // po aktiviranje na user-ot go menuvame kopceto od activate vo deactivate i dodavame accountNum za istiot user
            $("#"+data.id).children().eq(4).text(data.accountNum);
            $("#"+data.id).children().eq(5).html(`<button class="btn btn-danger" id="deactivate">deactivate</button>`);
        })
        
    })

    function showError(msg){
        // ja koristime sekogash koga sakame da prikazeme error alert
        let alert = $(".alert");
        alert.removeClass("alert-success").addClass("alert-danger");
        alert.text(msg);
        alert.show();
    }

    function showSuccess(msg){
        // ja koristime sekogash koga sakame da prikazeme success alert
        let alert = $(".alert");
        alert.removeClass("alert-danger").addClass("alert-success");
        alert.text(msg);
        alert.show();
    }

    // dokolku imame nekakov alert da ni se prikrijat na focus na nekoj od inputite
    $("#email").focus(function(){
        $(".alert").hide();
    });
    $("#password").focus(function(){
        $(".alert").hide();
    })
})