<?php

      function show_errors($msg,$status='true'){
        return response()->json(
          ['message' => $msg,'status' => $status]
        );
      }

 ?>
