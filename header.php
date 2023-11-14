

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Dictionary</title>
  <script src="https://cdn.tailwindcss.com"></script>

</head>
<body class="max-w-2xl mx-auto px-5 md:px-0 pb-10">
    <header>
        <nav class="py-6 flex flex-row items-center w-full justify-between">
            <!-- Icon -->
            <div class="">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="gray" class="w-8 h-8">
  <path stroke-linecap="round" stroke-linejoin="round" d="M12 6.042A8.967 8.967 0 006 3.75c-1.052 0-2.062.18-3 .512v14.25A8.987 8.987 0 016 18c2.305 0 4.408.867 6 2.292m0-14.25a8.966 8.966 0 016-2.292c1.052 0 2.062.18 3 .512v14.25A8.987 8.987 0 0018 18a8.967 8.967 0 00-6 2.292m0-14.25v14.25" />
</svg>

</div>

<div class="text-gray-700 ml-auto">
<select class="w-fit" name="fonts" id="fonts">
  <option value="serif">Serif</option>
  <option value="syne">Syne</option>
  <option value="san serif">San serif</option>
  <option value="raleway">Raleway</option>
</select>
</div>

<div class="ml-6">
<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="gray" class="w-8 h-8">
  <path stroke-linecap="round" stroke-linejoin="round" d="M17.982 18.725A7.488 7.488 0 0012 15.75a7.488 7.488 0 00-5.982 2.975m11.963 0a9 9 0 10-11.963 0m11.963 0A8.966 8.966 0 0112 21a8.966 8.966 0 01-5.982-2.275M15 9.75a3 3 0 11-6 0 3 3 0 016 0z" />
</svg>

</div>
</nav>
    </header>

    <main>
        <form action="includes/functions.inc.php" method="post" class=" px-2 py-1.5 rounded-lg bg-purple-100 flex" >
        <input class="focus:outline-none w-full bg-purple-100  placeholder:text-gray-600" placeholder="Enter keyword" type="text" name="word" id="">
            <div>
                <button name="submit" type="submit">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
          <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z" />
        </svg>
                    
                </button>

            </div>
        </form>