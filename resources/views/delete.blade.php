<td>
  <form action="/delete" method="POST">
    @csrf
    <input type="hidden" name="id" value="{{ $item->id }}">
    <button class="button-delete">削除</button>
  </form>
</td>