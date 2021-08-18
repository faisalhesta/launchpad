<html>
    <table>
        <tr>
            <th>Hello {{$name}},</th>
        </tr>
        <tr>
            <td>{{$data}}</td>
        </tr>
        <hr>
        @foreach ($users as $key=>$user )           
        
        <tr>
            <th>{{$key+1}}. {{$user['name']}} ({{$user['email']}})</th>
        </tr>
        @endforeach
        <tr><th>Regards, </th>
          
        <tr>
            <th>Launchpad Admin Team</th>
        </tr>
    </table>
</html>