const form=document.querySelector('form');
let statusText=document.querySelector('.statustext');
form.addEventListener('submit',(e)=>{
    e.preventDefault();
    statusText.style.display='block';
    const xhr=new XMLHttpRequest();
    xhr.open("POST","mailer.php",true);
    xhr.onload=()=>{
        if(xhr.readyState==4&&xhr.status==200){
            let response=xhr.response;
            console.log(response);
            
            if(response.indexOf("Reciever Email field is required !!! ") != -1 || 
            response.indexOf("Enter a Valid Email Address") != -1 || 
            response.indexOf("Sorry ! failed to send message ") != -1){
                statusText.style.color='red';
            }else{
                form.reset();
                setTimeout(()=>{
                    statusText.style.display='none';
                },3000);
            }
            statusText.innerHTML=response;
            
        }
    }
    let formData=new FormData(form);
    xhr.send(formData);
});