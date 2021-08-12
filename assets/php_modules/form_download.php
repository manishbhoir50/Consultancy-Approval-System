<?php
error_reporting(0);
include_once("connection.php");
include("common_methods.php");
include("form_details.php");
include('../vendor/autoload.php');


$id = $_GET['id'];
$form = get_form_details($id);
$sdrn = $form['Sdrn'];
$status = 'approved';
$faculty = get_faculty_details($sdrn);
$date = $form['Date_submission'];
$dateit=date_create($date);


?>
<html>
<style>
    @import url('https://fonts.googleapis.com/css2?family=Roboto+Condensed:wght@700&display=swap');
    * {
        border: 1rem;
        margin: 1rem;
        box-sizing: border-box;
    }
    img{
        width: 5%;
    }
    .center {
        display: flex;
        margin: auto;
        font-size: 9px;
        padding-bottom: 5px;
    }

    .right {
        /* display: flex; */
        text-align: right;
        padding-top: 7rem;
    }

    .class1 {
        grid-area: g1;
    }

    .class2 {
        grid-area: g2;
    }

    .grid-container {
        display: grid;
        grid-template: 'g1 g2 g2'
                       'g1 g2 g2';
    }
</style>

<body>

    <!-- <br> <br> <br> <br> -->
    <p class="right">
        <?php echo htmlentities(date_format($dateit,"dS F, Y") )?>
    </p> <br> <br>
    To,<br>
    Mr. <br>
    <?php echo htmlentities($form['Company_Name']) ?> <br>
    <?php echo htmlentities($faculty['Addr']) ?> <br>
    <br><br>
    <b>Subject:</b> Acceptance of Proposed execution of "
    <?php echo htmlentities($form['Topic']) ?> ".
    <br> <br>
    Sir,<br> <br>
    I am grateful to you for considering RAIT as a capable institute to perform this software. I have completely
    analysed the need for developing a "
    <?php echo htmlentities($form['Topic']) ?> " software which will help to reduce the workload in
    the industry.
    <br> <br>
    I hereby, propose a complete fee of ₹
    <?php echo htmlentities($form['Tentative_Amount']) ?>/- for the complete execution of the same.
    <br> <br>
    Once the software is completed, release the proposed payment at "Principal, RAIT" of ₹
    <?php echo htmlentities($form['Tentative_Amount']) ?>/-
    <br><br> <br>

    Thanking You <br> <br>
    With Warm regards, <br> <br>
    Dr.Vijay Patil <br>
    Principal, RAIT. <br>


</body>

</html>

<?php
$mpdf = new \Mpdf\mPDF();
$mpdf->SetHTMLHeader('
<div class="grid-container">
    <div class="class1">
        <!-- <img src="../images/logonew.jpeg" alt="LOGO" srcset=""> -->
    </div>
    <div class="class2">
    <p style="text-align: center; font-size: xx-small;"> RAMRAO ADIK EDUCATION SOCIETY&apos;S</p>
    <div style="text-align: center; font-weight: bold;font-size: 22pt ;color:#273045; font-family: sans-serif;">
    RAMRAO ADIK INSTITUTE OF TECHNOLOGY
    </div>
    </div>  
</div>
    <div style="border-top: 1px solid #383842; font-size: 9pt; text-align: center;  font-family: sans-serif; ">
    </div>
    <div  style="text-align: center; font-size: small;">Grade "A" Accredited by NAAC <span class="center">&#9679;</span> Affiliated to University
    Mumbai <span class="center" >&#9679;</span> Approved by AICTE & Govt. of Maharashtra</div>
    <div style="border-top: 1px solid #383842; font-size: 9pt; text-align: center; font-family: sans-serif; ">
    </div>
');
$mpdf->SetHTMLFooter('
<div style="text-align: center; font-weight: lighter;">
Dr. D. Y. Patil Vidyanagar, Sector-7, Phase-1, Nerul, Navi Mumbai-400706 | Ph.(+91) 22 27709574/27709505 Fax: (+91) 22 27709573 Website: www.rait.ac.in | E-mail: dypatilrait@rait.ac.in
</div>
');
$html = ob_get_contents();
$mpdf->writeHTML($html); 
ob_clean();
$mpdf->output($sdrn."Approval_Form.pdf", 'I');


?>