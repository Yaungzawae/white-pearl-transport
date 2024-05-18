@include("template/head",["css"=>"request"])
@include("template/navbar")
    
<div class="body-container">
    @include("template/detailbox", ["data" => $data])
    <div class="calendar-input-form">
    
    <Form action="/cancel-bus" method="POST">
        @csrf
        <Button>Cancel Bus</Button>
        <a>Please Cancel Before xx hours. </a>
    </Form>

    <Form action="request" method="POST">
        @csrf
            <div class="calendar-div">
                <p>Home to School</p>
                {{-- <input type="date" name="home-to-school"/> --}}
                <select name="home_to_school">
                    <option value="">
                        Not Select
                    </option>
                    @foreach($home_to_school as $time)
                        <option value={{$time["id"]}}>
                            {{$time["home_to_school"]}}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="calendar-div">
                <p>School to Home</p>
                {{-- <input type="date" name="home-to-school"/> --}}
                <select name="school_to_home">
                        <option value="">
                            Not Select
                        </option>
                    @foreach($school_to_home as $time)
                        <option value={{$time["id"]}}>
                            {{$time["school_to_home"]}}
                        </option>
                    @endforeach
                </select>

        </div>

        
        <label class="enquiry-label" for="enquiry">Enquiry</label>
        <input class="enquiry"
        name="enquiry"
        id="enquiry" 
        placeholder="Text any requirements, change mobile no, etc"
        />
        <button class="submit">Send mail</button>
    </Form>
</div>

</div>

@include("template/footer")
@include("template/foot")
