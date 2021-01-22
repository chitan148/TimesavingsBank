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
    const imgY = document.getElementById('tape_y')
    // let src = imgY.getAttribute('src');

    function overY(){
        imgY.setAttribute('src','image/m_tape_yellow_over.png');
    }       

    function leaveY(){
        imgY.setAttribute('src', 'image/m_tape_yellow_default.png');
    }       

    imgY.addEventListener('mouseover',overY);
    imgY.addEventListener('mouseleave',leaveY);

    //ピンク→緑
    const imgP = document.getElementById('tape_p');

    // let src = imgP.getAttribute('src');

    function overP(){
        imgP.setAttribute('src','image/m_tape_green.png');
    }       

    function leaveP(){
        imgP.setAttribute('src', 'image/m_tape_pink.png');
    }       

    imgP.addEventListener('mouseover',overP);
    imgP.addEventListener('mouseleave',leaveP);

    //青 →　黄色　
    const imgB = document.getElementById('tape_b');

    // let src = imgY.getAttribute('src');

    function overB(){
        imgB.setAttribute('src','image/m_tape_yellow_over.png');
    }       

    function leaveB(){
        imgB.setAttribute('src', 'image/m_tape_blue.png');
    }       

    imgB.addEventListener('mouseover',overB);
    imgB.addEventListener('mouseleave',leaveB);

    //緑→ピンク
    const imgG = document.getElementById('tape_g');

    // let src = imgP.getAttribute('src');

    function overG(){
        imgG.setAttribute('src','image/m_tape_pink.png');
    }       

    function leaveG(){
        imgG.setAttribute('src', 'image/m_tape_green.png');
    }       

    imgG.addEventListener('mouseover',overG);
    imgG.addEventListener('mouseleave',leaveG);

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
</script>