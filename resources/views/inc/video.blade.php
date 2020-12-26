@if($course->video_url != '')
<iframe height="450" width="100%"
src="https://www.youtube.com/embed/{{$course->video_url}}" frameborder="0" allowfullscreen>
</iframe>
@endif