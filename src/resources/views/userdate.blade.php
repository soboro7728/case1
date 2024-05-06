ゆーざーでーた


<form class="user__select" action="/userdate/select" method="get">
    <select name="select_id">
        @foreach($users as $user)
        <option value="{{ $user->id }}">{{ $user->name }}</option>
        @endforeach
    </select>
    <input type="submit" value="表示">
</form>

<!-- userdatesが存在するかどうか -->
@if(isset($userdates))
<table class="table-striped">
    <thead>
        <tr>
            <th>名前</th>
            <th>勤務開始</th>
            <th>勤務終了</th>
            <th>休憩時間</th>
            <th>勤務時間</th>
            <th>日付</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($userdates as $userdate)
        <tr>
            <td>{{ $userdate->user->name }}</td>
            <td>{{ $userdate->start_work->format('H:i:s') }}</td>
            <td>{{ $userdate->end_work->format('H:i:s') }}</td>
            <td>{{ $userdate->total_rest}}</td>
            <td>{{ $userdate->total_work}}</td>
            <td>{{ $userdate->stamp_date}}</td>

        </tr>
        @endforeach
    </tbody>
</table>
{{ $userdates->appends(request()->query())->links() }}
@else

@endif