

<?php
    function pdfEncrypt78 ($origFile, $password, $destFile){
        require_once('fpdi/FPDI_Protection.php');
        $pdf = new FPDI_Protection();
        $pdf->FPDF('P', 'in');
        //Calculate the number of pages from the original document.
        $pagecount = $pdf->setSourceFile($origFile);
        //Copy all pages from the old unprotected pdf in the new one.
        for ($loop = 1; $loop <= $pagecount; $loop++) {
            $tplidx = $pdf->importPage($loop);
            $pdf->addPage();
            $pdf->useTemplate($tplidx);
        }

        //Protect the new pdf file, and allow no printing, copy, etc. and
        //leave only reading allowed.
        $pdf->SetProtection(array(), $password);
        $pdf->Output($destFile, 'F');
        return $destFile;
    }

    //Password for the PDF file (I suggest using the email adress of the purchaser).
    $password = "testpassword";
    //Name of the original file (unprotected).
    $origFile = "Second_Semester_Scheme__IH_.pdf";
    //Name of the destination file (password protected and printing rights removed).
    $destFile ="sample_protected1.pdf";
    //Encrypt the book and create the protected file.
    pdfEncrypt($origFile, $password, $destFile );
?>
index.php
Displaying index.php.