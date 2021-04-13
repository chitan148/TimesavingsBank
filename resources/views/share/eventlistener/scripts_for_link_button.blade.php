<script>

    //黄色　
    const image_yellow = document.getElementById('tape_y');  

    image_yellow.addEventListener('mouseover',function(){
        this.setAttribute('src','image/m_tape_yellow_over.png');
    });
    image_yellow.addEventListener('mouseleave',function(){
        this.setAttribute('src','image/m_tape_yellow_default.png');
    });

    //ピンク　
    const image_pink = document.getElementById('tape_p');  

    image_pink.addEventListener('mouseover',function(){
        this.setAttribute('src','image/m_tape_pink_over.png');
    });
    image_pink.addEventListener('mouseleave',function(){
        this.setAttribute('src','image/m_tape_pink_default.png');
    });

    //青
    const image_blue = document.getElementById('tape_b');   

    image_blue.addEventListener('mouseover',function(){
        this.setAttribute('src','image/m_tape_blue_over.png');
    });
    image_blue.addEventListener('mouseleave',function(){
        this.setAttribute('src','image/m_tape_blue_default.png');
    });

    //緑
    const image_green = document.getElementById('tape_g');   

    image_green.addEventListener('mouseover',function(){
        this.setAttribute('src','image/m_tape_green_over.png');
    });
    image_green.addEventListener('mouseleave',function(){
        this.setAttribute('src','image/m_tape_green_default.png');
    });

    //ピンク
    const image_purple = document.getElementById('tape_pu');   

    image_purple.addEventListener('mouseover',function(){
        this.setAttribute('src','image/m_tape_purple_over.png');
    });
    image_purple.addEventListener('mouseleave',function(){
        this.setAttribute('src','image/m_tape_purple_default.png');
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

    //説明で使う黄色
        // const image_yellow = document.getElementById('tape_y');

        // function overY(){
        //     image_yellow.setAttribute('src','image/m_tape_yellow_over.png');
        // }       

        // function leaveY(){
        //     image_yellow.setAttribute('src','image/m_tape_yellow_default.png');
        // }       

        // image_yellow.addEventListener('mouseover',overY);
        // image_yellow.addEventListener('mouseleave',leaveY);


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
    //　まだ理解できない
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