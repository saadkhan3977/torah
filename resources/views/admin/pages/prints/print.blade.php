<!-- resources/views/prints/print.blade.php -->
<!DOCTYPE html>

<?php
use Carbon\Carbon;
// use URL;
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Basin Rock | Print Document</title>
    <style>
        body{
            margin: 0;
            padding: 0;
            background-color:#008000;
            font-family: 'Arial', sans-serif;
        }
        table, th, td {
          border: 1px solid black;
          border-radius: 5px;
        }
        th, td {
          background-color: #96D4D4;
          padding: 8px 0px;
        }
        tr{
            height:30px;
        }
        td{
            text-align: center;
            padding-left: 4px;
            padding-right: 4px;
        }
        h1{
            text-align:center;
        }
        table tr .detail
        {
            padding-left: 8px;
            padding-right: 8px;
        }
    </style>
</head>
<body>
    <h1>Basin Rock</h1>
    <table style="width:100%">
      <tr>
        <th>Equipment Name</th>
        <th>Name</th>
        <th>Email</th>
        <th>Operator / Inspector</th>
        <th>Date - Time</th>
        <th>Unit ID</th>
        <th>Equiment Hours</th>
        <th>Completed</th>
      </tr>
      <tr>
        <td >{{ $data->machine_name }}</td>
        <?php
           $user_name =  App\Models\User::where('id',$data->user_id)->first();
        ?>
        <td>{{ $user_name->name }}</td>
        <td>{{ $user_name->email }}</td>
        <td>{{ $data->operator_inspector }}</td>
        @php
                                        
            $inputDate = $data->date;
            $carbonDate = Carbon::parse($inputDate);
            $formattedDate = $carbonDate->format('m-d-Y');
            $time_extracted = $carbonDate->format('H:i:s');
        @endphp
        <td>{{ $formattedDate }} - {{ $time_extracted }}</td>
        <td>{{ $data->unit_id }}</td>
        <td>{{ $data->machine_hours }}</td>
        <td>{{ ($data->is_completed == 'true') ? "Completed" : "Null" }}</td>
      </tr>
    </table>
    
    <table style="width:100%">
      <tr>
        <th class="detail">Question No</th>
        <th class="detail">What Inspecting</th>
        <th class="detail">What Looking</th>
        <th class="detail">Answer</th>
        <th class="detail">Evaluator Comments</th>
        <th class="detail">Conclusion Message</th>
      </tr>
      @foreach($all_data as $item)
      <tr>
        <td >{{ $item->qno_id }}</td>
        <td>{{ $item->what_inspecting }}</td>
        <td>{{ $item->what_looking }}</td>
        <td style="text-transform:capitalize;">{{ $item->answer ?? "no"}}</td>
        <td>{{ $item->evaluator_comments ?? "-" }}</td>
        <td>{{ $item->conclusion_message ?? "-" }}</td>
      </tr>
      @endforeach
    </table>
    <h1>Basin Rock</h1>
    
    
    <script>
        // You can include additional JavaScript for customization
    </script>
</body>
</html>

