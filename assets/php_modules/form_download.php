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
$dateit = date_create($date);


?>
<html>
<style>
    @import url('https://fonts.googleapis.com/css2?family=Roboto+Condensed:wght@700&display=swap');

    * {
        border: 1rem;
        margin: 1rem;
        box-sizing: border-box;
    }

    img {
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
        padding-top: 5rem;
    }

    .class1 {
        grid-area: g1;
    }

    .class2 {
        grid-area: g2;
    }

    /* .grid-container {
        display: grid;
        grid-template: 'g1 g2 g2'
            'g1 g2 g2';
    } */
    table {
        display: flex;
        margin: auto;
    }

    tr,
    td {
        padding: 3px;
    }
</style>

<body>

    <!-- <br> <br> <br> <br> -->
    <p class="right">
        <?php echo htmlentities(date_format($dateit, "dS F, Y")) ?>
    </p> <br> <br>
    To,<br>
    Mr. <br>
    <?php echo htmlentities($form['Company_Name']) ?> <br>
    <?php echo htmlentities($form['location']) ?> <br>
    <br><br>
    <b>Subject:</b> Acceptance of Proposed execution of "
    <?php echo htmlentities($form['Topic']) ?> ".
    <br> <br>
    Dear Sir,<br> <br>
    I am thankful to you for considering Ramrao Adik Institute of Technology as a profession institute for developing a "
    <?php echo htmlentities($form['Topic']) ?> ". We are competent and can meet your complete project requirements.
    Please find the quotation for development:
    <br><br>

    <table border="1">
        <tr>
            <td>Project In-Charge</td>
            <td><?php echo htmlentities($faculty['First_name']) ?> <?php echo htmlentities($faculty['Last_name']) ?></td>
        </tr>
        <tr>
            <td>Description of Project</td>
            <td><?php echo htmlentities($form['Topic']) ?></td>
        </tr>
        <tr>
            <td>Development Cost</td>
            <td> ₹<?php echo htmlentities($form['development_cost']) ?> + <?php echo htmlentities($form['taxes']) ?>% Taxes</td>
        </tr>
        <tr>
            <td>Maintenance Charges</td>
            <td><?php echo htmlentities($form['maintenance']) ?></td>
        </tr>
        <tr>
            <td>Time Delivery</td>
            <td><?php echo htmlentities($form['delivery_time']) ?></td>
        </tr>
    </table>
    <br> <br>

    As discussed, please send the requirements and release the proposed payment of ₹
    <?php echo htmlentities($form['development_cost']) ?> + Taxes in cheque payable in "Ramrao Adik Institute of Technology". <br>
    Or for online Transaction : <br>
    Mahanagar Cooperative Bank Nerul <br>
    Bank account No: 017010100000191 <br>
    IFSC Code: MCBL0960017

    <br><br> <br>

    Thanking You <br>
    With Warm regards, <br> <br>

    Dr.Vijay Patil <br>
    Principal, <br>
    Ramrao Adik Institute of Technology <br> <br>

    Ramrao Adik Institute of Technology <br>
    Nerul, Navi Mumbai- 400706.

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
<div style="text-align: center; font-weight: lighter;font-size: 10px;">
Dr. D. Y. Patil Vidyanagar, Sector-7, Phase-1, Nerul, Navi Mumbai-400706 | Ph.(+91) 22 27709574/27709505 Fax: (+91) 22 27709573 Website: www.rait.ac.in | E-mail: dypatilrait@rait.ac.in
</div>
');
$html = ob_get_contents();
$mpdf->writeHTML($html);
ob_clean();
$mpdf->output($sdrn . "Approval_Form.pdf", 'I');


?>