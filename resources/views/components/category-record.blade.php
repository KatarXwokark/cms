<tr>
    <td>{{$category->name}}</td>
    @if ($user->userType > 1)
    <td class="text-right"><a class="text-center" href="{{route('category.edit', ['id' => $category->id])}}"><i class="fa fa-angle-double-right"></i></a></td>
    <td class="text-center">
        <form method="POST" action="/api/category/{{$category->id}}">
            {{ csrf_field() }}
            {{ method_field('DELETE') }}
            <button class="btn btn-link" type="submit"><i class="fa fa-trash-o"></i></button>
        </form>
    </td>
    @endif
</tr>
<tr></tr>