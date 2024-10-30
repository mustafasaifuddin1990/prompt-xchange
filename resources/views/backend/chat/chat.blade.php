@extends('backend/partials/header')
@section('content')
    <style>
        .attachemnts_ineer_messages img {width: 150px !important;height: 150px !important;border-radius: 10px !important;}

        .message_div .attachemnts_ineer_messages > a {
            background: linear-gradient(90deg, #1C2DB0, #CB48D8);
            padding: 6px 20px;
            border-radius: 40px;
            color: #fff;
            text-decoration: none;
        }
        .attachMents_all ul {
            list-style: none;
            margin: 0;
            padding: 0;
            display: flex;
            width: 110px;
            justify-content: space-between;
        }

        .attachMents_all input::file-selector-button {
            border: 0;
            background: none;
        }

        .attachMents_all input {
            font-size: 0;
            position: absolute;
            width: 100%;
            left: 0;
            top: 0;
            height: 100%;
            cursor: pointer;
        }

        .attachMents_all ul li {
            position: relative;
            line-height: 1;
            color: #fff;
        }

        .attachMents_all ul li svg {
            color: #ffffff;
            padding-right: 10px;
            font-size: 20px;
        }

        .attachMents_all ul li span {
            font-size: 16px;
            font-family: 'Raleway';
            font-weight: 500;
        }

        .attachMents_all ul li:not(:last-child) {
        }
        .attachMents_all {
            position: absolute;
            left: 70px;
            bottom: 19px;
            border-radius: 10px;
            transform: translateX(-20px);
            visibility: hidden;
            opacity: 0;
            transition: 0.5s all ease-in-out;
        }
        .plus_sign_click.active .attachMents_all {
            transform: translateY(0px);
            visibility: visible;
            opacity: 1;
        }
        .plus_sign_click {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 60px;
            margin-right: 20px;
        }
        .plus_sign_click svg.fa-plus {
            background: linear-gradient(90deg, #1C2DB0, #CB48D8);
            padding: 10px 11px;
            color: #fff !important;
            border-radius: 50%;
            cursor: pointer;
            transition: 0.5s all ease-in-out;
        }
        .plus_sign_click.active .fa-plus {transform: rotate(135deg);}
        .skeleton {
            position: relative;
            overflow: hidden;
            background-color: #161a1f;
            padding: 8px;
            border-radius: 10px;
        }

        .skeleton::after {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 200%;
            height: 100%;
            background: linear-gradient(90deg, rgba(255, 255, 255, 0), rgba(255, 255, 255, 0.2), rgba(255, 255, 255, 0));
            animation: shimmer 1.5s infinite;
        }

        @keyframes shimmer {
            0% {
                left: -100%;
            }
            100% {
                left: 100%;
            }
        }

        /* Skeleton for chat avatars */
        .skeleton-avatar {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            background-color: #0c0d10;
        }

        /* Skeleton for names */
        .skeleton-name {
            width: 100px;
            height: 10px;
            background-color: #0c0d10;
            margin-left: 10px !important;
            margin-right: 10px;
            border-radius: 4px;
            margin-bottom: 0;
        }

        /* Skeleton for timestamps */
        .skeleton-time {
            width: 40px;
            height: 8px;
            background-color: #0c0d10;
            border-radius: 4px;
        }

        /* Skeleton for messages */
        .skeleton-msg {
            width: 200px;
            height: 15px;
            background-color: #0c0d10;
            border-radius: 4px;
            margin-top: 10px;
        }

        /* Skeleton for input fields */
        .skeleton-input {
            width: 100%;
            height: 40px;
            background-color: #161a1f;
            border-radius: 4px;
            margin-bottom: 10px;
            padding: 5px;
        }

        .send_btn.skeleton-icon {
            width: 40px;
            height: 40px;
            background-color: #0c0d10;
            border-radius: 50%;
            margin-left: 10px;
        }

        /* Skeleton for receive messages */
        li.recieve.chat.skeleton {
            display: flex;
            align-items: end;
            justify-content: end;
            flex-direction: column;
        }

        .chat_conversation .chat_head .img_prof.skeleton-avatar {
            background-color: #161a1f;
        }

        .chat_prof p.skeleton.skeleton-name {
            background-color: #161a1f;
        }

        .chat_head.d-flex.skeleton {
            background: #0c0d10;
            border: 0;
            padding: 20px 20px;
        }


    </style>
    <section class="dashboard_secs chat_sec">
        <div class="container-fluid">

            <div class="row">
                <div class="col-12 search_row">
                    <div class=" d-flex justify-content-between">
                        <div class="back">
                            <a href="javascript:;" class="back_btn"><i class="fa-solid fa-arrow-left"></i></a><span>Inbox</span>
                        </div>
                        <div class="search_div">
                            <input type="text" placeholder="Search">
                            <button><i class="fa-solid fa-magnifying-glass fa-fw"></i></button>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="chat_name">
                        <div class="search_name">
                            <input type="text" placeholder="Search">
                            <button><i class="fa-solid fa-magnifying-glass fa-fw"></i></button>
                        </div>
                        <div class="friend_name">
                            <ul></ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-9">
                    <div id="main_chat_contianer">
                        <div class="chat_conversation">
                            <div class="chat_head d-flex skeleton">
                                <div class="chat_prof">
                                    <div class="img_prof skeleton-avatar"></div>
                                    <p class="skeleton skeleton-name"></p>
                                </div>
                            </div>

                            <ul class="chats">
                                <!-- Skeleton for sent message -->
                                <li class="sent chat skeleton">
                                    <div class="chat_info d-flex">
                                        <div class="skeleton-avatar"></div>
                                        <p class="skeleton skeleton-name"></p>
                                        <div class="skeleton skeleton-time"></div>
                                    </div>
                                    <div class="conver skeleton skeleton-msg"></div>
                                </li>

                                <!-- Skeleton for received message -->
                                <li class="recieve chat skeleton">
                                    <div class="chat_info d-flex">
                                        <div class="skeleton-avatar"></div>
                                        <p class="skeleton skeleton-name"></p>
                                        <div class="skeleton skeleton-time"></div>
                                    </div>
                                    <div class="conver skeleton skeleton-msg"></div>
                                </li>
                                <li class="sent chat skeleton">
                                    <div class="chat_info d-flex">
                                        <div class="skeleton-avatar"></div>
                                        <p class="skeleton skeleton-name"></p>
                                        <div class="skeleton skeleton-time"></div>
                                    </div>
                                    <div class="conver skeleton skeleton-msg"></div>
                                </li>

                                <!-- Skeleton for received message -->
                                <li class="recieve chat skeleton">
                                    <div class="chat_info d-flex">
                                        <div class="skeleton-avatar"></div>
                                        <p class="skeleton skeleton-name"></p>
                                        <div class="skeleton skeleton-time"></div>
                                    </div>
                                    <div class="conver skeleton skeleton-msg"></div>
                                </li>
                            </ul>

                            <div class="message_type skeleton">
                                <div class="skeleton skeleton-input"></div>
                            </div>
                        </div>

                    </div>

                </div>
            </div>
        </div>
    </section>

    <script>
        const fetch_users = async () => {
            try{
                const user_id = {{Auth::user()->id}};
                const response = await axios.get(`{{route('get-users')}}?user_id=${user_id}`);
                const users = response.data.users;
                const usersArray = Array.isArray(users) ? users : Object.values(users || {});
                const User_divs = document.querySelector('.friend_name ul')
                usersArray.forEach(data => {
                    const create_div = document.createElement('li')
                    create_div.classList.add('d-flex', 'align-items-center');
                    const image_data = data.user_picture
                        ? `${data.user_picture}`
                        : '{{ asset('backend/assets/img/account_img.png') }}';

                    const name_user = `${data.name}`;
                    create_div.setAttribute('onclick',`get_chat_data('${data.id}','${user_id}','${image_data}', '${name_user}')`)

                    create_div.innerHTML = `
                        <img src="${image_data}" alt="">
                        <div class="cont">
                            <p>${name_user}</p>
                            <span>${data.current_message}</span>
                        </div>
                        <div class="time">
                            <span>${data.time_ago}</span>
                        </div>
                    `;


                    User_divs.insertBefore(create_div, User_divs.lastChild)
                });

            }catch (error){
                console.error(error);
            }
        }
        fetch_users();

        const get_chat_data = async (receiver_id, sender_id, receiver_image, name)=>{
            try {
                const response = await axios.get(`{{route('get-chat-messages')}}?sender_id=${sender_id}&receiver_id=${receiver_id}`);
                const messages =  response.data.message;
                const usersArray = Array.isArray(messages) ? messages : Object.values(messages || {});
                const reversedMessages = usersArray.reverse();
                const site_url = window.location;
                const get_site_url = `${site_url.protocol}//${site_url.hostname}${site_url.port ? ':' + site_url.port : ''}`;

                window.chatData = {
                    [receiver_id]: reversedMessages
                };
                let data_chat = `
                <div class="chat_conversation">
                  <div class="chat_head d-flex">
                      <div class="chat_prof">
                          <div class="img_prof">
                              <img src="${receiver_image}" alt="">
                              <p class="name">${name}</p>
                          </div>
                      </div>
                  </div>

                  <ul class="chats all_messages">
                            `;
                if (reversedMessages.length) {
                    reversedMessages.forEach(data => {
                        const image_data = data.sender.user_picture
                            ? `${data.sender.user_picture}`
                            : '{{ asset('backend/assets/img/account_img.png') }}';
                        data_chat += `
                                <li class="${data.sender_id == sender_id ? 'recieve' : 'sent'} chat">
                                    <div class="chat_info d-flex">
                                        <img src="${image_data}" alt="">
                                        <p class="name">${name}</p>
                                        <div class="chat_time">${data.time_ago}</div>
                                    </div>
                                        `;

                        if(data.content === null){

                            if(data.attachment_type === 'docs'){
                                const splited_url = data.attachment.split('/');

                                data_chat += `
                                                <div class="message_div">
                                                    <div class="attachemnts_ineer_messages">
                                                        <a href="${get_site_url}/storage/${data.attachment}" download>
                                                            <i class="fas fa-file"></i>
                                                            <span>${splited_url[1]}</span>
                                                        </a>
                                                    </div>
                                                </div>
                                            `;

                            } else if(data.attachment_type === 'image'){

                                data_chat += `
                                                <div class="message_image">
                                                    <div class="attachemnts_ineer_messages">
                                                        <a target="_blank" href="${get_site_url}/storage/${data.attachment}">
                                                            <img src="${get_site_url}/storage/${data.attachment}" class="atached_image">
                                                        </a>
                                                    </div>
                                                </div>
                                            `;

                            }

                        }
                        else{
                            data_chat += `
                                    <div class="conver">
                                       ${data.content}
                                    </div>
                                            `;
                        }
                        data_chat += `
                                </li>
                            `;
                    });
                }
                data_chat += `
                            </ul>
                        <div class="message_type">
                            <input
                            id="message_input"
                            type="text"
                            placeholder="Type a message"
                            onkeydown="if (event.key === 'Enter'){ submit_message(${receiver_id}, ${sender_id}, '${receiver_image}', '${name}'); event.preventDefault();}"
                            >
                            <div class="send_mxg d-flex justify-content-between">
                                  <div class="plus_sign_click" onclick="plus_sign_click(this)">
                                    <div class="attachMents_all" onclick="event.stopPropagation();">
                                        <ul>
                                            <li>
                                                <i class="fas fa-file"></i>
                                                <input type="file" name="attachments_docs" id="attachments_docs" accept=".doc,.docx,.pdf" onclick="event.stopPropagation();">
                                                <span class="counter doc_counter">0</span>
                                            </li>
                                            <li>
                                                <i class="fas fa-images"></i>
                                                <input type="file" name="attachments_pics" id="attachments_pics" accept=".png,.jpeg,.jpg,.svg,.webp" onclick="event.stopPropagation();">
                                                <span class="counter img_counter">0</span>
                                            </li>
                                        </ul>
                                    </div>
                                    <i class="fas fa-plus"></i>
                                </div>
                                <button class="gradient_btn" onclick="submit_message(${receiver_id}, ${sender_id}, '${receiver_image}', '${name}')">send</button>
                            </div>
                        </div>
                    </div>`;

                document.getElementById('main_chat_contianer').innerHTML = data_chat;
                const chatContainer = document.querySelector('.chat_conversation .chats');
                chatContainer.scrollTop = chatContainer.scrollHeight;
            }catch (e) {
                console.error(e);
            }
        }

        const plus_sign_click = (button)=> {
            button.classList.toggle('active');

            let message = document.getElementById('message_input');
            const docs =  document.getElementById('attachments_docs');
            const images = document.getElementById('attachments_pics');

            message.setAttribute('disabled', 'disabled');

            if(!button.classList.contains('active')){
                docs.value = '';
                images.value = '';
                message.removeAttribute('disabled');
                document.querySelector('.doc_counter').innerHTML = '0';
                document.querySelector('.img_counter').innerHTML = '0';

            }else{
                docs.addEventListener('change', function () {
                    if (docs.value) {
                        document.querySelector('.doc_counter').innerHTML = '1';
                    }
                    if(images.value){
                        images.value = '';
                        document.querySelector('.img_counter').innerHTML = '0';
                    }

                });

                images.addEventListener('change', function () {
                    if (images.value) {
                        document.querySelector('.img_counter').innerHTML = '1';
                    }
                    if(docs.value){
                        docs.value = '';
                        document.querySelector('.doc_counter').innerHTML = '0';
                    }

                });
            }



        }


        const submit_message = async (receiver_id, sender_id, receiver_image, name) => {
            let message = document.getElementById('message_input');
            let documents = document.getElementById('attachments_docs');
            let pictures = document.getElementById('attachments_pics');



            if(message.value || documents.files[0] || pictures.files[0]){
                const payload = new FormData;

                payload.append('current_user',sender_id);
                payload.append('receiver_id',receiver_id);
                payload.append('message_content',message.value);
                if (documents) payload.append('documents',documents.files[0]);
                if (pictures) payload.append('pictures', pictures.files[0]);

                try {
                    const response = await axios.post(`{{route('send-messages')}}`, payload, {
                        header:{
                            'Content-Type': 'multipart/form-data'
                        }
                    });
                    if (response.data.status) {
                        message.value = '';
                        get_chat_data(receiver_id , sender_id, receiver_image, name)
                    }
                }catch (error){
                    console.error(error);
                }
            }
        }
    </script>


    <script>

        var user_Id = {{ Auth::user()->id }};
        var pusher_new = new Pusher('0a5b245168c649759dcc', {
            cluster: 'ap2',
        });

        var chat_system = pusher_new.subscribe('chat-system.' + user_Id);
        chat_system.bind('chat_receiver', function( data ) {

            const message_divs = document.querySelector('.all_messages')

            let data_left_msg;

            const site_url = window.location;
            const get_site_url = `${site_url.protocol}//${site_url.hostname}${site_url.port ? ':' + site_url.port : ''}`;
            const image_data = data.data.sender.user_picture
                ? `${data.data.sender.user_picture}`
                : '{{ asset('backend/assets/img/account_img.png') }}';

            if(data.data.content === null){
                if(data.data.attachment){

                    if(data.data.attachment_type === 'docs'){
                        const splited_url = data.data.attachment.split('/');
                        data_left_msg = `
                        <li class="sent chat">
                            <div class="chat_info d-flex">
                                <img src="${image_data}" alt="">
                                <p class="name">${data.data.sender.name}</p>
                                <div class="chat_time">${data.data.time_ago}</div>
                            </div>
                            <div class="message_div">
                                <div class="attachemnts_ineer_messages">
                                    <a href="${get_site_url}/storage/${data.data.attachment}" download>
                                        <i class="fas fa-file"></i>
                                        <span>${splited_url[1]}</span>
                                    </a>
                                </div>
                            </div>
                        </li>
                        `;
                    }
                    if(data.data.attachment_type === 'image'){
                        data_left_msg = `
                        <li class="sent chat">
                            <div class="chat_info d-flex">
                                <img src="${image_data}" alt="">
                                <p class="name">${data.data.sender.name}</p>
                                <div class="chat_time">${data.data.time_ago}</div>
                            </div>
                            <div class="message_image">
                                <div class="attachemnts_ineer_messages">
                                    <a target="_blank" href="${get_site_url}/storage/${data.data.attachment}">
                                        <img src="${get_site_url}/storage/${data.data.attachment}" class="atached_image">
                                    </a>
                                </div>
                            </div>
                        </li>
                        `;
                    }
                }
            }
            else {
                data_left_msg = `
                <li class="sent chat">
                    <div class="chat_info d-flex">
                        <img src="${image_data}" alt="">
                        <p class="name">${data.data.sender.name}</p>
                        <div class="chat_time">${data.data.time_ago}</div>
                    </div>
                    <div class="conver">
                       ${data.data.content}
                    </div>
                </li>
                `;
            }
            const main_scroll = document.querySelector('.chat_conversation .chats')
            message_divs.insertAdjacentHTML('beforeend', data_left_msg);

            // Scroll to the bottom of the chat
            main_scroll.scrollTop = main_scroll.scrollHeight;
        })
    </script>

@endsection

