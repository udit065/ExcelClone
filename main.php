<?php
  session_start();
  require 'dbcon.php';

  //if not loggedin session set OR session loggedin not true then redirect to login page
  if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!=true){
      header("location: login.php");
      exit;
  }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Excel-Clone</title>
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
        integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
    <link rel="stylesheet" href="\MiniProject\style.css">
    <style>
        .l-btn{
            min-width: 60px;height: 100%;display: flex;justify-content: center;align-items: center;
            border: 0.2px solid;cursor: pointer;margin-left: 84rem;border-radius: 0.3rem;
        }
        .sheet-bottom-btn:hover {
        background-color: #058f58;
        color: #fff;
        }
        
        .tooltip .tooltiptext {
            visibility: hidden;
            /* width: 10px; */
            /* height: 1.6rem; */
            background-color: rgb(250, 248, 248);
            color: rgb(20, 19, 19);
            font-size: 0.5rem;
            text-align: center;
            border-radius: 6px;
            /* padding: 5px 0; */
            /* border: 1px solid black; */
            display: flex;
            justify-content: center;
            align-items: center;
            margin-top: 5px;
        
            /* Position the tooltip */
            position: absolute;
            z-index: 1;
        }
        
        .tooltip:hover .tooltiptext {
            visibility: visible;
        }
    </style>
</head>
<body>
    <div class="menu_bar">
        <!-- new - open - save  -->
        <div class="new_open_save_container ">
            <div class="icon_container">
                <i class="fas fa-file tooltip">
                    <span class="tooltiptext">New</span>
                </i>
            </div>
            <div class="icon_container">
                <i class="fas fa-envelope-open tooltip">
                    <span class="tooltiptext">Open</span>
                </i>
            </div>
            <div class="icon_container">
                <i class="fas fa-save tooltip">
                    <span class="tooltiptext">Save</span>
                </i>
            </div>
            <input type="file" name="" id="file_Input" style="display: none;">
        </div>
        <!-- font family and font size  -->
        <!-- using select and options  -->
        <div class="formatting_container">
            <select class="font_family_input formatting_input">
                <option style="font-family:sans-serif" value="sans-serif">sans-serif</option>
                <option style="font-family:monospace" value="monospace">monospace</option>
                <option style="font-family:serif" value="serif">serif</option>
                <option style="font-family:cursive" value="cursive">cursive</option>
                <!-- <option value="Courier New">Courier New</option> -->
                <option style="font-family:Noto Sans" value="Noto Sans">Noto Sans</option>
                <option style="font-family:Arial" value="Arial">Arial</option>
                <option style="font-family:Calibri" value="Calibri">Calibri</option>
                <option style="font-family:Comic Sans MS" value="Comic Sans MS">Comic Sans MS</option>
                <option style="font-family:Courier New" value="Courier New">Courier New</option>
                <option style="font-family:Palatino" value="Palatino">Palatino</option>
            </select>
            <select class="font_size_input formatting_input">
                <option value="10">10</option>
                <option value="12">12</option>
                <option value="14" selected>14</option>
                <option value="16">16</option>
                <option value="18">18</option>
                <option value="20">20</option>
                <option value="22">22</option>
                <option value="24">24</option>
                <option value="26">26</option>
                <option value="28">28</option>
                <option value="30">30</option>
                <option value="32">32</option>
            </select>
        </div>
        <!-- bold - italic - underline  -->
        <div class="bui_container">
            <i class="fas fa-bold tooltip">
                <span class="tooltiptext">Bold</span>
            </i>
            <i class="fas fa-underline tooltip">
                <span class="tooltiptext">Underline</span>
            </i>
            <i class="fas fa-italic tooltip">
                <span class="tooltiptext">Italic</span>
            </i>
        </div>

        <!-- left-align right-align center -->
        <div class="alignment_container">
            <i class="fas fa-align-left tooltip">
                <span class="tooltiptext">left align</span>
            </i>
            <i class="fas fa-align-center tooltip">
                <span class="tooltiptext">align center</span>
            </i>
            <i class="fas fa-align-right tooltip">
                <span class="tooltiptext">right align</span>
            </i>
            <i class="fas fa-align-justify tooltip">
                <span class="tooltiptext">justify</span>
            </i>
        </div>

        <!-- colors  -->
        <div class="color_container">
            <i class="fas fa-tint"></i>
            <i class="fas fa-fill-drip"></i>
            <input type="color" action="fg-color" class="text_color" style="display: none;" />
            <input type="color" action="bg-color" class="background_color" style="display: none;" />
        </div>
        <!-- LOGOUT LOGO-->
        <div>
            <a href="#logout.php">
                <img src="images/images.png" alt="User Avatar" style="height: 34px;float: right;margin: 5px;">
            </a>
            <?php
                echo '<strong>Welcome '.$_SESSION['name'].'</strong>';
                ?>
        </div>
    </div>
    <div class="formula_bar">
        <input type="text" class="address_bar">
        <img src="pngwing.com.png" alt="">
        <input type="text" class="formula_execute_bar" placeholder="Formula with space seperated such that ( A1 + A2 )">
    </div>
    <div class="grid_container">
        <div class="top_left_row">

        </div>
        <div class="top_row">

        </div>
        <div class="left_col">

        </div>
        <div class="grid">

        </div>
    </div>
    <div class="sheets_bar">
        <div class="add-sheet_container">
            <i class="fas fa-plus icon"></i>
        </div>
        <div class="sheets-list sheet-bottom-btn">
            <div class="sheet active-sheet" sheetIdx="0"> Sheet 1</div>
        </div>

        <div>
            <a href="logout.php" class="l-btn sheet-bottom-btn">Logout</a>
        </div>
                
    </div>
    <template>
        <div class="cell" contenteditable="true" rId="" cId=""></div>
        <div class="sheet" sheetIdx=""></div>
    </template>

    <script src="init.js"></script>
    <script src="menu.js"></script>
    <script src="newopensave.js"></script>
    <script src="formula.js"></script>
</body>

      

</html>