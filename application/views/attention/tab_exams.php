<?php
 //$diagnosis_info variable comes from "edit.php" file
?>

<?php echo get_exams_list(); //options_helper ?>



<?php
  $exam_ids = "";

  foreach ($exams_info as $exam) {
    $exam_ids .= $exam['attention_exam_id'] . ",";
  }
?>

<script>
  $(document).ready(function() {
    //NEED SAVE
    _need_save = false;


    //CHANGE COLOR WHEN EXAM IS SELECTED
    $('.tab-exams .exam-elem input').click(function() {
        $(this).parent().toggleClass('selected');
        _need_save = true;
    });



    //GET DATA AND SELECT THE EXAMS IN THE LIST
    _exams_ids = [<?php echo $exam_ids; ?>];

    //console.log(_exams_ids);
    //console.log(_exams_ids.length);
    //console.log("===================");

    while(_exams_ids.length > 0) {
      //console.log(_exams_ids.length);
      exam_id = _exams_ids.pop();
      //console.log("pop: " + exam_id);
      //console.log("-----------------");

      $('.tab-exams .exam-elem').each(function() {
        aux_id = $(this).find('input').attr('data-id');
        //console.log("exam id: " + aux_id);

        if(parseInt(exam_id) == parseInt(aux_id)) {
          $(this).find('input').trigger("click");
          return false;
        }
      });
    }


    //SAVE
    if(_need_save) {

    }

  });
</script>
