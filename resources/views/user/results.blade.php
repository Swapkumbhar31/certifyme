<div class="table-responsive">
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Date</th>
                <th>Course Name</th>
                <th>Exam Type</th>
                <th>Result</th>
                <th>Attempt Questions</th>
            </tr>
        </thead>
        <tbody>
            @php ($count = 1)
            @foreach($results as $t)
                <tr>
                    <td>{{$count++}}</td>
                    <td>{{$t->submit_time}}</td>
                    <td>{{$t->name}}</td>
                    <td>{{$t->exam_type}}</td>
                    <td>{{$t->result}}/{{$t->total_questions}}</td>
                    <td>{{$t->attempt_questions}}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
