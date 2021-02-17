<tr>
    <td>{{$template->name}}</td>
    <td class="text-right"><a class="text-center" href="{{route('template.edit', ['id' => $template->id])}}"><i class="fa fa-angle-double-right"></i></a></td>
    <td class="text-center">
        <form method="POST" action="/api/template/{{$template->id}}">
            {{ csrf_field() }}
            {{ method_field('DELETE') }}
            <button class="btn btn-link" type="submit"><i class="fa fa-trash-o"></i></button>
        </form>
    </td>
</tr>
<tr></tr>