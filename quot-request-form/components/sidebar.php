
    <div class="sidebar">
        <h2>LOGO</h2>
        <ul>
            <?php 
            if (isset($_SESSION['user_id'])) { 
              echo '<li>
              <a href="./"><i class="fas fa-home"></i>Home</a>
            </li>
            <li>
              <a href="#" role="button" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="fas fa-user"></i>Logout</a>
            </li>'; 
            }else{ 
              echo '<li><a href="#"> Welcome! </li>';
            } 
            ?>
          
        </ul>
      </div>
    

      <?php  include_once 'components/modals.php'; ?>