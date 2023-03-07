<?php
session_start();
if (!$_SESSION['librarian']) {
  header("location: index.php");
  exit;
}
else {?>
   <!DOCTYPE html>
   <html lang="en">
   <head>
       <meta charset="UTF-8">
       <meta http-equiv="X-UA-Compatible" content="IE=edge">
       <meta name="viewport" content="width=device-width, initial-scale=1.0">
       <title>Document</title>
       <link rel="stylesheet" href="css/style.css">   
      </head>
   <body>
       <?php 
       include('php/dbconnect.php');
       include('header.php'); 
       include('navigation-bar.php');
       $books = mysqli_query($db,"SELECT*FROM tblbooks WHERE ReturnStatus=0 ");
       $num_of_books = mysqli_num_rows($books);
       $nbr = 1;
       ?>
       <div class="container">
         <div>Total number of books not returned:<?php echo $num_of_books; ?></div>
         <table id="table">
           <thead>
             <th>#</th>
             <th>Book Name</th>
             <th>Book No</th>
             <th>Issuedate</th>
           </thead>
           <tbody>
           <?php 
           while ($results = mysqli_fetch_assoc($books)) {
             $bookName = $results['BookTitle'];
             $bookNo = $results['BookNo'];
             $issueDate = $results['issuedate'];
             ?>
            <tr>
              <td><?php echo $nbr; ?></td>
              <td><?php echo $bookName; ?></td>
              <td><?php echo $bookNo; ?></td>
              <td><?php echo $issueDate; ?></td>
            </tr>
           <?php $nbr++; } 
           ?>
          </tbody>
          </table>
       </div>
   </body>
   </html>
<?php } ?>