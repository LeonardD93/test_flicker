<!DOCTYPE html>
<a href='/refresh' class='button'>Aggiorna</a>

<body class="antialiased">
    <table>
        <thead>
            <tr>             
                <td>immagine</td>
                <td>Titolo</td>
                <td>Sttotitolo</td>
            </tr>
        </thead>
        <tbody>
            @foreach ( $data as $elem)
            <tr>
                <td>
                    <img src="{{$elem->media}}"  />
                </td>
                <td>
                    {{ $elem->title}}
                </td>
                <td>
                     {{ $elem->date_taken  }}                   
                </td>
                <td>
                    <a href='/details/{{ $elem->id }}' class='button'>Dettagli</a>               
                </td>      
            </tr>
            @endforeach
        </tbody>
    </table>
    </body>
</html>
