<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kejmin Card</title>
    <link rel= "icon" type = "image/x-icon" href = "K_Images/KJMN.png">
</head>
<body>
    <div class = "gallery">
    <div class = "card">
 <!-- Place Holder Image -->
<img src= "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcS8HW0RumWV_GF03zyeXK2NI_uLoWlAcM4HjorEeO0w89ZgCMqZTp3S2Zzv3GngtzYuy6dh0ZzLxA0hbhxXloJ9Ezrf2oTBykmQ0iJZEoo&s=10">
<h3> Kejmin </h3>
<hr> 
<h4> Description </h4> 
<br> 
<p> TBD </p>
</div>
</div>
    <style>
        body{
            /* Path to the image */
            background-image: url(https://img.magnific.com/premium-photo/old-yellow-grunge-background-blank-crumpled-paper_186380-1525.jpg);
            /* Make image not repeat */
            background-repeat: no-repeat;
            /* Make the image cover the entire page */
            background-size: cover;
            /* Make the image Center */
            background-position: center center; 
            /* Make it not move when scrolling */
            background-attachment: fixed;
            /* Make the body fill the entire browser height */
            min-height: 100vh;
           
          
        }
        .gallery{
            display:flex;
            flex-wrap: wrap;
            /* Make the context in the center*/
            justify-content: center;
            gap:20px;
        }
        .card{
            /*Set the width and height of card */
               width:300px;
               height: 500px;
               /*Set background color */
               background-color:white;
               /*Make the border and set radius */
               border: 2px solid black;
               border-radius:10px;
               padding:10px;
               text-align:center;
               box-shadow: 0 2px 5px rgba(0,0,0,0.2);
               margin-top: 40px;
        }
        .card img{
    width:100%;
    /* Make the border and set the radius*/
    border: 2px solid black;
    border-radius: 8px;
} 
h3{
    /*Set the font */
    font-family: monospace;
    /* Add an outline to the text */
    -webkit-text-stroke: 1px #D6B588;
    /* Adjust size */
    font-size: 20px;
}
h4{
    /*Set the font */
    font-family:monospace;
    /*Add an outline to the text */
    -webkit-text-stroke: 1px #D6B588;
    /*Adjust size*/
    font-size: 14px;
}
hr{
    /*Set the font */
    font-family:monospace;
    /* Make sure the line is filled in */
    background-color: black;
    width: 100%;
    height: 1px;
}
        </style>
</body>
</html>