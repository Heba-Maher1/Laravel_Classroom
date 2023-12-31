<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>

<nav class=" navbar bg-body-tertiary shadow-sm">
  <div class="container">
    <div class="left">
      <i class="fa-solid fa-bars m-3 fs-5"></i>  
       <a class="navbar-brand" href="{{ route('home')}}">
          {{-- {{ config ('app.name' , 'Laravel')}}  --}}
          ClassroomGoogle
          
      </a>
    </div>
    <div class="right d-flex justify-content-betweeen align-items-center">
      <a class="link-secondary m-3" href="{{ route('classrooms.create')}}">
        <i class="fa-solid fa-plus fs-5"></i>
      </a>
      <button button class="btn btn-outline-success" type="submit">Login</button>
    </div>
   
    
  </div>
</nav>