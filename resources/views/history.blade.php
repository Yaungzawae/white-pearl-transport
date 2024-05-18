@include("template/head",["css"=>"history"])
@include("template/navbar")

<div class="body-container">
    @include("template/detailbox", ["data" => $data])


        <form action="/history" method="POST">
            @csrf
            <div class="calendar-input-form">
                <div class="calendar-wrapper">
                    <p>Home To School</p>
                    <div class="calendars-container">
                        <input type="date" id="info-start-date" name="info-start-date" />
                        <p>to</p>
                        <input type="date" id="info-end-date" name="info-end-date"/>
                    </div>
                </div>
                <div class="calendar-wrapper">
                    <p>School To Home</p>
                    <div class="calendars-container">
                        <input type="date" id="cancel-start-date" name="cancel-start-date"/>
                        <p>to</p>
                        <input type="date" id="cancel-end-date" name="cancel-end-date"/>
                    </div>
                </div>
            </div>
        
            <button class="submit">Send mail</button>    
        </form>

        
</div>

@include("template/footer")
@include("template/foot")