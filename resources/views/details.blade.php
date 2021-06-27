<!DOCTYPE html>
    <a href='/' class='button'>return </a>
    <table>
        <thead>
            <tr>             
                <td>Campo</td>
                <td>Valore</td>
            </tr>
        </thead>
        <tbody>

            <tr>
                <td>id</td>
                <td>{{$data->id}}</td>
            </tr>
            <tr>
                <td>title</td>
                <td>{{$data->title}}</td>
            </tr>
            <tr>
                <td>link</td>
                <td>{{$data->link}}</td>
            </tr>
            <tr>
                <td>media</td>
                <td><img src="{{$data->media}}"  /></td>
            </tr>
            <tr>
                <td>date_taken</td>
                <td>{{$data->date_taken}}</td>
            </tr>
            <tr>
                <td>description</td>
                <td>{{$data->description}}</td>
            </tr>
            <tr>
                <td>published</td>
                <td>{{$data->published}}</td>
            </tr>
            <tr>
                <td>author</td>
                <td>{{$data->author}}</td>
            </tr>
            <tr>
                <td>author_id</td>
                <td>{{$data->author_id}}</td>
            </tr>
            <tr>
                <td>tags</td>
                <td>{{$data->tags}}</td>
            </tr>
    
    
    </tbody>
    </table>

</html>