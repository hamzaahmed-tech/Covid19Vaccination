// navbar 

const drop_down_li = document.querySelectorAll('.drop_down_li'),
 drop_down = document.querySelector('.drop_down'),
 links = document.querySelector('.links'),
 menu = document.querySelector('.menu'),
 drop_down_toggle = document.querySelector('.drop_down_toggle'),
 nav_li_toggle = document.querySelectorAll('.nav_li'),
 logout_btn = document.querySelector('.logout_btn');




console.log(themeInput);
drop_down_li.forEach((crr)=>{

    let drop_down = crr.querySelector('.drop_down');
    crr.addEventListener('click',()=>{
        drop_down.classList.toggle('toggle_drop_down')
    })
    
})



 console.log(nav_li_toggle);

menu.addEventListener('click',()=>{
    links.classList.toggle('links_toggle')
    drop_down_toggle.classList.toggle('drop_down_toggle')
    menu.classList.toggle('menu_active')
    nav_li_toggle.forEach(crr=>{
        crr.classList.toggle('nav_li_toggle')
    })

})


logout_btn.addEventListener('click',()=>{
    // confirm('logout this page');
    if(confirm('logout this page') === true){
        logout_btn.href='logout.php';
    }else{
        logout_btn.href='#';
    }
})



