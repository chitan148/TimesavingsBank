<script>
    // const img = document.getElementById('m_tape');

    // let src = img.getAttribute('src');

    // function over(){
    //     img.setAttribute('src','/image/m_tape_blue.png');
    // }

    // function leave(){
    //     img.setAttribute('src', 'image/m_tape_yellow.png');
    // }

    // img.addEventListener('onmouseover',over);
    // img.addEventListener('onmouseleave',leave);
        
    // function over() {
    //     const img = document.getElementById('m_tape');
    //     img.setAttribute('src', 'image/m_tape_pink.png');
    // }
    // function leave() {
    //     const img = document.getElementById('m_tape');
    //     img.setAttribute('src', 'image/m_tape_yellow.png');
    // }
   
    // function over() {
    // //     const img_passes = ['image/m_tape_pink.png', 'image/m_tape_yellow.png','image/m_tape_blue.png','image/m_tape_green.png']
    //     const img = document.getElementById('m_tape');
    //     const src = img.getAttribute('src');
    //     let img_pass;
    // //     if(src === img_passes[1]){
    // //         img_pass = img_passes[0]
    // //     } else if(src === img_passes[0]) {
    // //         img_pass = img_passes[2]
    // //     } else if(src === img_passes[2]){
    // //         img_pass = img_passes[3]
    // //     } else if(src === img_passes[3]){
    // //         img_pass = img_passes[1]
    // //     }
    //     if(src === 'image/m_tape_yellow.png'){
    //         img.setAttribute('src','/image/m_tape_blue.png');
    //     }
       
    // }
    // function leave() {
    //     var img = document.getElementById('m_tape');
    //     img.setAttribute('src', 'image/m_tape_yellow.png');
    // }



    //黄色　
    const image_yellow = document.getElementById('tape_y')   

    image_yellow.addEventListener('mouseover',function(){
        this.setAttribute('src','image/m_tape_yellow_over.png');
    });
    image_yellow.addEventListener('mouseleave',function(){
        this.setAttribute('src','image/m_tape_yellow_default.png');
    });

    //ピンク　
    const image_pink = document.getElementById('tape_p')   

    image_pink.addEventListener('mouseover',function(){
        this.setAttribute('src','image/m_tape_pink_over.png');
    });
    image_pink.addEventListener('mouseleave',function(){
        this.setAttribute('src','image/m_tape_pink_default.png');
    });

    //青
    const image_blue = document.getElementById('tape_b')   

    image_blue.addEventListener('mouseover',function(){
        this.setAttribute('src','image/m_tape_blue_over.png');
    });
    image_blue.addEventListener('mouseleave',function(){
        this.setAttribute('src','image/m_tape_blue_default.png');
    });

    //緑
    const image_green = document.getElementById('tape_g')   

    image_green.addEventListener('mouseover',function(){
        this.setAttribute('src','image/m_tape_green_over.png');
    });
    image_green.addEventListener('mouseleave',function(){
        this.setAttribute('src','image/m_tape_green_default.png');
    });

    //まえのやつ
    // const imgG = document.getElementById('tape_g');

    // function overG(){
    //     imgG.setAttribute('src','image/m_tape_green_over.png');
    // }       

    // function leaveG(){
    //     imgG.setAttribute('src', 'image/m_tape_green_default.png');
    // }       

    // imgG.addEventListener('mouseover',overG);
    // imgG.addEventListener('mouseleave',leaveG);

    // 
    //     const img = document.getElementById('m_tape');

    //     let src = img.getAttribute('src');

    //     function over(){
    //         img.setAttribute('src','image/m_tape_blue.png');
    //     }       

    //     function leave(){
    //         img.setAttribute('src', 'image/m_tape_yellow.png');
    //     }       

    //     img.addEventListener('mouseover',over);
    //     img.addEventListener('mouseleave',leave);


    // 
    //     const img = document.getElementById('m_tape');
    //     let src = img.getAttribute('src');
        
    //     function over() {
    //         img.setAttribute('src', 'image/m_tape_pink.png');
    //     }
    //     function leave() {
    //         img.setAttribute('src', 'image/m_tape_yellow.png');
    //     }
    //     img.onmouseover = over;
    //     img.onmouseleave = leave;

    // 

    // const buttonImageMapping = {
    //     'tape_y': {
    //         mouseover: 'image/m_tape_yellow_over.png',
    //         mouseleave: 'image/m_tape_yellow_default.png'
    //     },
    //     'tape_p': {
    //         mouseover: 'image/m_tape_pink_over.png',
    //         mouseleave: 'image/m_tape_pink_default.png'
    //     },
    //     'tape_b': {
    //         mouseover: 'image/m_tape_blue_over.png',
    //         mouseleave: 'image/m_tape_blue_default.png'
    //     },
    //     'tape_g': {
    //         mouseover: 'image/m_tape_green_over.png',
    //         mouseleave: 'image/m_tape_green_default.png'
    //     }
    // }

    // Object.keys(buttonImageMapping).forEach(type => {
    //     const img = document.getElementById(type);
    //     img.addEventListener('mouseover', function () { 
    //         this.setAttribute('src',buttonImageMapping[type].mouseover);
    //     });
    //     img.addEventListener('mouseleave', function () { 
    //         this.setAttribute('src',buttonImageMapping[type].mouseleave);
    //     });
    // });
</script>