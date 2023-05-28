@extends("layouts.main")
@section("content")
    @include("components.navbar")
    <main class="h-[calc(100vh-4rem)] flex items-center justify-center p-8">
        <div class="flex justify-center w-full h-full">
            <div class="w-full">
                <div class="bg-white flex flex-col justify-center py-12 px-24 rounded-xl gap-4 h-full">
                    {{-- chat box with 2 section, left for chats list and right for chat--}}
                    <div class="flex flex-col justify-between h-full">
                        {{-- chats list --}}
                        <div class="flex flex-row h-full">
                            <div class="flex flex-col h-3/4 w-1/3">
                                {{-- chat list header --}}
                                <div class="flex justify-between items-center py-4">
                                    <h1 class="text-2xl font-bold">Chats</h1>
                                    <!-- new chat -->
                                    {{-- trigger modal --}}
                                    <a role="button" class="bg-white p-2 rounded-full" data-modal-target="newChatModal" data-modal-toggle="newChatModal">
                                        <img width="28" height="28" src="https://img.icons8.com/windows/32/create-new.png" alt="create-new"/>
                                    </a>
                                </div>
                                {{-- chat list --}}
                                <div class="flex flex-col gap-4 overflow-y-auto">
                                    {{-- chat list item --}}
                                    @foreach ($chats as $chat)
                                    <?php
                                        if($chat->last_sender == Auth::user()->name){
                                            ?>
                                                <button class="flex justify-between items-center rounded-lg p-4 bg-white hover:bg-gray-100" onclick="showChat({ id: {{ $chat->id }}, target:'{{ $chat->username_2 == Auth::user()->name ? $chat->username_1 : $chat->username_2 }}' })" id="chat_{{ $chat->id }}">
                                            <?php
                                        }else if($chat->last_sender != Auth::user()->name && $chat->last_sender!="null"){
                                            ?>
                                                <button class="flex justify-between items-center rounded-lg p-4 bg-gray-100 hover:bg-gray-200" onclick="showChat({ id: {{ $chat->id }}, target:'{{ $chat->username_2 == Auth::user()->name ? $chat->username_1 : $chat->username_2 }}' })" id="chat_{{ $chat->id }}">
                                            <?php
                                        }else{
                                            ?>
                                                <button class="flex justify-between items-center rounded-lg p-4 bg-white hover:bg-gray-100" onclick="showChat({ id: {{ $chat->id }}, target:'{{ $chat->username_2 == Auth::user()->name ? $chat->username_1 : $chat->username_2 }}' })" id="chat_{{ $chat->id }}">
                                            <?php
                                        }
                                    ?>
                                            <div class="flex gap-4 items-center">
                                                <img class="w-12 h-12 rounded-full" src="{{ asset('images/user.png') }}" alt="avatar">
                                                <div>
                                                    {{-- if username 2 is same with user. change to username 1 --}}
                                                    <h1 class="text-xl font-bold text-left">{{ $chat->username_2 == Auth::user()->name ? $chat->username_1 : $chat->username_2 }}</h1>
                                                    <?php
                                                        if($chat->last_sender == Auth::user()->name){
                                                            echo "<p class='text-gray-500 text-left'>Anda mengirimkan pesan </p>";
                                                        }else if($chat->last_sender != Auth::user()->name && $chat->last_sender!="null"){
                                                            ?>
                                                            <p class="text-gray-500 text-left">{{ $chat->last_sender }} mengirimkan pesan baru</p>
                                                            <?php
                                                        }else{
                                                            echo "<p class='text-gray-500 text-left'>pesan dibaca</p>";
                                                        }
                                                    ?>
                                                </div>
                                            </div>
                                            <div class="flex flex-col gap-4">
                                                <p class="text-gray-500">{{ $chat->last_time }}</p>
                                            </div>
                                        </button>
                                    @endforeach
                                </div>
                            </div>
                            {{-- div pembatas --}}
                            <div class="w-20 border-r-2 border-gray-300 flex justify-center">
                                <div class="h-full w-1" style="border-right: 2px solid #b3b3b3;"></div>
                            </div>
                            {{-- chat --}}
                            <div class="flex flex-col h-full w-2/3 hidden" id="right-section">
                                {{-- chat header --}}
                                <div class="flex justify-between items-center py-4">
                                    <div class="flex gap-4 items-center">
                                        <img class="w-12 h-12 rounded-full" src="{{ asset('images/user.png') }}" alt="avatar">
                                        <div>
                                            <h1 id="chat_target" class="text-xl font-bold"></h1>
                                            <p id="role_target" class="text-gray-500"></p>
                                        </div>
                                    </div>
                                </div>
                                <div class="flex flex-col" style="height:90%">
                                    {{-- chat body --}}
                                    <ul class="flex flex-col flex-1 overflow-y-scroll" id="message-panel" style="max-height: 90%; min-height:90%;">
                                    </ul>
                                    {{-- chat footer --}}
                                    <input type="hidden" id="sender" value="{{ Auth::user()->name }}" name="sender">
                                    <div class="flex flex-none items-center gap-4 relative">
                                        <input id="pesan_baru" class="w-full h-12 rounded-lg border-2 border-gray-300 px-4" type="text" placeholder="Masukkan pesan anda...">
                                        <button type="button" class="p-2 absolute right-0 mr-2" id="submit-message">
                                            <img width="28" height="28" src="https://img.icons8.com/material-outlined/24/000000/filled-sent.png" alt="send"/>
                                        </button>
                                    </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    {{-- modal tambah chat --}}
    <div id="newChatModal" data-modal-backdrop="static" tabindex="-1" aria-hidden="true" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative w-full max-w-2xl max-h-full">
            <!-- Modal content -->
            <div class="relative bg-white rounded-lg shadow">
                <!-- Modal header -->
                <div class="flex items-start justify-between p-4 border-b rounded-t dark:border-gray-600">
                    <h3 class="text-xl font-semibold text-gray-900">
                        Chat Baru
                    </h3>
                    <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="newChatModal">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>  
                    </button>
                </div>
                <!-- Modal body -->
                <form action="{{ url("/chat") }}" method="POST">
                    @csrf
                    <div class="p-6 space-y-6">
                        <div class="flex flex-col gap-4">
                            <div class="flex flex-col gap-2">
                                <label for="username_2" class="text-sm font-medium text-gray-700">Penerima</label>
                                <input type="hidden" value="{{ Auth::user()->name }}" name="username_1">
                                {{-- select from $users --}}
                                <select name="username_2" id="username_2" class="w-full h-12 rounded-lg border-2 border-gray-300 px-4">
                                    <option value="" selected disabled>Pilih Penerima</option>
                                    @foreach ($users as $user)
                                        <option value="{{ $user->name }}">{{ $user->name }} - {{ $user->role->role_name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="flex flex-col gap-2">
                                <label for="pesan" class="text-sm font-medium text-gray-700">Pesan</label>
                                <input type="text" name="message" id="pesan" class="w-full h-12 rounded-lg border-2 border-gray-300 px-4" placeholder="Pesan">
                            </div>
                        </div>
                    </div>
                    <!-- Modal footer -->
                    <div class="flex items-center p-6 space-x-2 border-t border-gray-200 rounded-b dark:border-gray-600">
                        <button data-modal-hide="newChatModal" type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Kirim</button>
                        <button data-modal-hide="newChatModal" type="button" class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">Batal</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script>
        var input = document.getElementById("pesan_baru");
        input.addEventListener("keyup", function(event) {
            if (event.keyCode === 13) {
                event.preventDefault();
                document.getElementById("submit-message").click();
            }
        });
        function showChat(object){
            var chatId = document.getElementById(`chat_${object.id}`);
            chatId.classList.remove("bg-gray-100");
            fetch(`{{ url("/readChat") }}/${object.id}`)
            var rightSection = document.getElementById("right-section");
            rightSection.classList.add("hidden");
            var id = object.id
            var target = object.target;
            var chatTarget = document.getElementById("chat_target");
            chatTarget.innerHTML = target;
            var submitMessage = document.getElementById("submit-message");
            submitMessage.setAttribute("onclick", `sendMessage(${id})`);
            var messagePanel = document.getElementById("message-panel");
            
            var roleTarget = document.getElementById("role_target");
            fetch(`{{ url("/getRole") }}/${target}`)
            .then(response => response.json())
            .then(data => {
                roleTarget.innerHTML = data;
            });
            fetch(`{{ url("/getChat") }}/${id}`)
            .then(response => response.json())
            .then(data => {
                messagePanel.innerHTML = "";
                data.forEach(element => {
                    // created at like : 2023-05-27T04:09:15.000000Z
                    var hour = element.created_at.split("T")[1].split(":")[0]
                    // hour + 7 and if less than 10 add 0
                    hour = (parseInt(hour) + 7) % 24;
                    if(hour < 10){
                        hour = "0" + hour;
                    }
                    var minute = element.created_at.split("T")[1].split(":")[1];
                    var time = `${hour}:${minute}`;
                    element.created_at = time;
                    if(element.sender == "{{ Auth::user()->name }}"){
                        messagePanel.innerHTML += `
                        <div class="flex flex-col gap-1 items-end mb-2 mr-3">
                            <div class="flex flex-col gap-1 bg-green-100 p-3 bg-rounded">
                                    <p class="text-sm text-gray-500">${element.message}</p>
                                    <p class="text-xs text-gray-400 text-right">${element.created_at}</p>
                                </div>
                            </div>
                        `;
                    }else{
                        messagePanel.innerHTML += `
                            <div class="flex flex-col gap-1 items-start mb-2">
                                <div class="flex flex-col gap-1 bg-gray-100 p-3 bg-rounded">
                                    <p class="text-sm text-gray-500">${element.message}</p>
                                    <p class="text-xs text-gray-400 text-left">${element.created_at}</p>
                                </div>
                            </div>
                        `;
                    }
                });
            });
            rightSection.classList.remove("hidden");
        }
        function sendMessage(id){
            var sender = document.getElementById("sender").value;
            var message = document.getElementById("pesan_baru");
            var messagePanel = document.getElementById("message-panel");
            var hour = new Date().getHours();
            var minute = new Date().getMinutes();
            if(hour < 10){
                hour = "0" + hour;
            }
            if(minute < 10){
                minute = "0" + minute;
            }
            var time = `${hour}:${minute}`;
            messagePanel.innerHTML += `
                <div class="flex flex-col gap-1 items-end mb-2 mr-3">
                    <div class="flex flex-col gap-1 bg-green-100 p-3 bg-rounded">
                        <p class="text-sm text-gray-500">${message.value}</p>
                        <p class="text-xs text-gray-400 text-right">${time}</p>
                    </div>
                </div>
            `;
            fetch(`{{ url("/message") }}`, {
                method: "POST",
                headers: {
                    "Content-Type": "application/json",
                    "X-CSRF-TOKEN": "{{ csrf_token() }}"
                },
                body: JSON.stringify({
                    chat_id: id,
                    sender: sender,
                    message: message.value
                })
            })
            message.value = "";
            message.focus();
        }
    </script>
@stop
