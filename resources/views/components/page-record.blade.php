<tr>
    <td>{{$page->name}}</td>
    <td class="text-right"><a class="text-center" href="{{route('page.edit', ['id' => $page->id])}}"><i class="fa fa-angle-double-right"></i></a></td>
    @if ($user->userType > 1)
    <td class="text-center">
        <form method="POST" action="/api/page/{{$page->id}}">
            {{ csrf_field() }}
            {{ method_field('DELETE') }}
            <button class="btn btn-link" type="submit"><i class="fa fa-trash-o"></i></button>
        </form>
    </td>
    @endif
</tr>
<tr></tr>