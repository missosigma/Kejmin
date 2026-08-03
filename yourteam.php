<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1> Your Team </h1> 
<div class="card-container">
  <div class="card">
    <div class="img-wrapper">
      <img src="https://picsum.photos/id/237/536/354" alt="Kejmin">
    </div>
    <h3>Kejmin</h3>
    <h4> Health: </h4>
  </div>
  
  <div class="card">
    <div class="img-wrapper">
      <img src="https://picsum.photos/id/237/536/354" alt="Kejmin">
    </div>
    <h3>Kejmin</h3>
    <h4> Health: </h4>
  </div>

  <div class="card">
    <div class="img-wrapper">
      <img src="https://picsum.photos/id/237/536/354" alt="Kejmin">
    </div>
    <h3>Kejmin</h3>
    <h4> Health: </h4>
  </div>

  <div class="card">
    <div class="img-wrapper">
      <img src="https://picsum.photos/id/237/536/354" alt="Kejmin">
    </div>
    <h3>Kejmin</h3>
    <h4> Health: </h4>
  </div>

  <div class="card">
    <div class="img-wrapper">
      <img src="https://picsum.photos/id/237/536/354" alt="Kejmin">
    </div>
    <h3>Kejmin</h3>
    <h4> Health: </h4>
  </div>

  <div class="card">
    <div class="img-wrapper">
      <img src="https://picsum.photos/id/237/536/354" alt="Kejmin">
    </div>
    <h3>Kejmin</h3>
    <h4> Health: </h4>
  </div>
</div>
<style>
*, *::before, *::after {
  box-sizing: border-box;
  margin: 0;
  padding: 0;
}

h1{
    text-align:center;
    color: white;
    -webkit-text-stroke: 1px black;
    font-family:Impact;
}
body{
    background-color: #B9A5E2;
}
 .card-container {
display:flex;
flex-wrap: wrap;
justify-content: center;
gap:40px;    
width: 100%;
  max-width: 360px;
    margin: 20px auto;     
}

.card {
  width: calc(50% - 20px);    
  flex-basis: calc(50% - 20px); 
  aspect-ratio: 1 / 1; 
  background-color: white;
   border-radius:10px;
    padding:10px;
    text-align:center;    
    border: 2px solid black;  
}      
 
.card img {
      width:100%;
    border-radius: 8px;
    border: 2px solid black;
} 
h3{
    font-family:Impact;
    -webkit-text-stroke: 0.5px #B9A5E2;
    font-size:18px;
}
h4{
    font-family: monospace;
    -webkit-text-stroke: 0.5px #B9A5E2;
    font-size: 14px;
}


    </style>
</body>
</html>