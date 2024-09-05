<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Select Login Role</title>
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">

  <!-- Add favicon here -->
  <link rel="icon" href="../images/favicon.png" type="image/x-icon">

  <style>
    p{
      font-size: 20px;
    }
    .bg-background {
      background-color: #ffffff;
    }

    .text-foreground {
      color: #333333;
    }

    .text-muted-foreground {
      color: #888888;
    }

    .hover\:bg-gray-100:hover {
      background-color: #f0f0f0;
    }

    .border-border {
      border-color: #dddddd;
    }

    .hover\:bg-gray-200:hover {
      background-color: #e2e2e2;
    }
  </style>
</head>

<body class="bg-background flex flex-col items-center justify-center min-h-screen p-4">
  <div class="text-center mb-8">
    <a href="../en/index.php"><img src="../images/logo.png" alt="Logo" class="mx-auto mb-4"></a>
    <p class="text-blue-500">Please <span class="font-bold">CHOOSE A ROLE</span> to <span class="font-bold">LOG IN</span> to the system</p>
  </div>

  <div class="flex justify-around w-full max-w-4xl">
    <a href="../Admin/public/login_admin_en.php" class="text-center hover:bg-gray-100 p-6 rounded-lg border border-border cursor-pointer">
      <img src="../user/admin.png" alt="Admin" class="mx-auto mb-4">
      <h2 class="text-xl font-bold text-foreground">Admin</h2>
      <p class="text-muted-foreground">If you are an Admin, click here to log in.</p>
    </a>

    <a href="form_login_en.php" class="text-center hover:bg-gray-100 p-6 rounded-lg border border-border cursor-pointer">
      <img src="../user/male.png" alt="User" class="mx-auto mb-4">
      <h2 class="text-xl font-bold text-foreground">User</h2>
      <p class="text-muted-foreground">If you are a User, click here to log in.</p>
    </a>

  </div>
</body>

</html>
