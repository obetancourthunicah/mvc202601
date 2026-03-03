<section class="container">
    <table class="">
        <thead>
            <tr>
                <th>Código</th>
                <th>Título</th>
                <th>Género</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            {{foreach libros}}
            <tr>
                <td>{{id}}</td>
                <td>{{titulo}}</td>
                <td>{{genero}}</td>
                <td></td>
            </tr>
            {{endfor libros}}
        </tbody>
    </table>
</section>