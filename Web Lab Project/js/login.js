	//on register button show register inputs
    
    function validateForm() {
        let x = document.forms["loginForm"]["email"].value;
        let y = document.forms["loginForm"]["pass"].value;

        if (x == "" || y=="") {

          const name=document.getElementById("inputEmail").value;  
          const pass=document.getElementById("inputPassword").value;  

          if(name==""){
             name=document.getElementById("ver_em");
           name.innerHTML="Name is required";  
          };
          if(pass==""){
            pass=document.getElementById("inputPassword");
            pass.innerHTML="Password is required";  
          };
          alert("noo");

          return false;

        }else{
        // alert("bala ghenej w me7en, just insert a valid email and password");
        }
      }
    
    const pass=document.querySelector(".btn-reg");
    pass.addEventListener("click",hide);
   
    function hide(){
        const login=document.querySelector(".login");
            login.style.display='none';
            login.innerHTML='';

            const log=document.querySelector("#log1");
            log.style.display='none';

            const reg=document.querySelector("#reg1");
            reg.style.display='none';
            show();
    };

    function show(){
        
        const passs=document.querySelector(".hiddenP");
        const output =
        `    
        <form  class="form-container" >
       
        <div class="form-row" >
            <div class="col-md-6 form-group ad" style="padding:0; ">
                <label for="name">name</label>
                <input class="form-control" type="text" name="name" id="inputName" placeholder="Name" required>
            </div>
            <div class="col-md-6 form-group ad" style="padding:0; ">
                <label for="lastName">last name</label>
                <input class="form-control" type="text" name="lastName" id="inputlastName" placeholder="Last name" required>
            </div>
        </div>

        <div class="form-group ad">
            <label for="lastName">Gender</label>
            <select class="custom-select" name="gender" required>
                <option value="">select gender</option>
                <option value="male" >Male</option>
                <option value="female" >Female</option>
                <option value="unknown" >Prefer not to say</option>
            </select>
        </div>

        <div class="form-group ad">
            <label for="phoneNumber">phone number</label>
            <input class="form-control" type="tel" minlength="8" maxlength="8" name="phone" id="phonenumber" placeholder="Phone number" required>
        </div>

        <div class="form-group ad">
            <label for="inputEmail">Email</label>
            <input class="form-control" type="email" name="email" id="inputEmail" placeholder="Email" required>
        </div>

        <div class="form-group ad">
            <label for="inputPassword">Password</label>
            <input class="form-control" type="password"  minlength="5" name="pass" id="inputPassword" placeholder="Password" required>
        </div>

        <div class="form-group ad">
            <label for="confirmPassword">Confirm password</label>
            <input class="form-control" type="password"  minlength="5" name="confPass" id="confirmPassword" placeholder="Conf Password" required>
        </div>
        
        <input type="submit" value="Register" class="btn btn-block btn-reg" id="reg2"   method="POST" formaction="php/register.php" >
        </form>
        <input  id="log2" class="btn btn-primary btn-block " value="already have an account?" >
        
        
        `;

        passs.innerHTML=output;

        const pass=document.querySelector("#log2");
        pass.addEventListener("click",()=>{
            passs.innerHTML="";

            const login=document.querySelector(".login");
            login.innerHTML=
            `<div class="form-group">
            <label for="inputEmail">Email</label><br/>
            <input type="email" name="email" id="inputEmail" placeholder="Email" required>
          </div>
          <div class="form-group">
            <label for="inputPassword">Password</label><br/>
            <input minlength="5" type="password" name="pass" id="inputPassword" placeholder="Password" required>
          </div>`;

            tog();
        });
       
    };
  
    function tog(){
      
        const added=document.querySelectorAll(".ad");

        for(ad of added)
            ad.classList.add('hidden');

            const login=document.querySelector(".login");
            login.style.display='block';
    
            const log=document.querySelector("#log1");
            log.style.display='block';

            const reg1=document.querySelector("#reg1");
            reg1.style.display='block';

    }
