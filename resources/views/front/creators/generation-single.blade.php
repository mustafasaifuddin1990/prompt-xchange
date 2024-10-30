@extends('front/partials/header')
@section('content')
    <style>
        .loader{
         display: block;
        }
        .post_comment p {
            text-align: center;
            padding-top: 20px;
            margin: 0;
        }
        .docs_comments a svg {
            font-size: 20px;
            padding-right: 10px;
        }
        .comment_div .docs_comments {
            padding-left: 5%;
            padding-bottom: 40px;
        }

        .docs_comments a {
            font-size: 16px;
            color: #C0C0C0;
            line-height: 2;
            background: #101317;
            padding: 10px 20px;
            border-radius: 30px;
        }

        .image_comments {
            padding-left: 5%;
            padding-bottom: 40px;
        }

        .image_comments img {
            border: none;
            width: 110px;
            height: 100px;
            border-radius: 11px;
        }
        .attached_file ul input {
            font-size: 0;
            position: absolute;
            top: 0;
            right: 0;
            width: 100%;
            height: 100%;
            cursor: pointer;
        }
        .create_comment .attached_file a {
            position: relative;
            text-decoration: none;
        }
        .attached_file ul input::file-selector-button {
            background: none;
            border: 0;
            padding: 0;
        }
        .attached_file ul.hidden {
            opacity: 1;
            visibility: visible;
            transform: none;
            z-index: -1;
        }

        .attached_file ul {
            opacity: 0;
            visibility: hidden;
            transform: translateX(-70%);
            z-index: -1;
            transition: 0.5s all ease-in-out;
        }
        .attached_file ul {
            padding: 0;
            margin: 0;
            display: flex;
            list-style: none;
        }

        a#open_tab {
            background: linear-gradient(90deg, #1C2DB0, #CB48D8);
            padding: 12px 14px;
            height: fit-content;
            border-radius: 50px;
            color: #fff;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: 0.5s all ease-in-out;
        }
        .attached_file  a.added {
            transform: rotate(135deg);
        }
        .create_comment .attached_file {
            height: fit-content;
            align-items: center;
            z-index: 0;
        }
        .post_comment {padding-bottom: 40px;}
        .comment_div img.loader {
            border: 0;
            margin-right: 0;
            margin-left: 20px;
            height: 60px;
            width: 60px;
        }
        .all_replies {
            background: #161a1f;
        }
        .all_replies .comment_prof:before {
            content: '';
            background: linear-gradient(90deg, #1C2DB0, #CB48D8);
            position: absolute;
            left: -4%;
            right: 0;
            top: 44%;
            width: 34px;
            height: 2px;
            border-radius: 30px;
        }
        .all_replies .comment_prof {
            position: relative;
        }
    </style>
    <section class="comment_sec">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="d-flex">
                        <div class="btn_row mb-5 pb-5">
                            @forelse($categories as $id => $category_name)
                                <a href="javascript:;" class="gradient_btn mr-2">{{ $category_name }}</a>
                            @empty
                                <p class="empty-cat">No category assigned.</p>
                            @endforelse
                        </div>

                    </div>
                    <div class="blog_profile_cont d-fex">
                        <div class="pic d-fex">
                            <div class="prof_det d-flex">
                                <div class="d-flex">
                                    <img src="{{$user_data['user_profile_picture']}}">
                                    <strong>{{$user_data['user_name']}}</strong>
                                </div>
                            </div>
                            <a href="" class="follow_btn">Follow</a>
                        </div>
                    </div>
                    <div class="comment_view_row d-flex justify-content-between">
                        <div class="view d-flex">
                            <span><i class="fa-regular fa-eye"></i>1.8M</span>
                            <span><i class="fa-regular fa-message"></i>4K</span>
                        </div>
                        <div class="share d-flex">
                            <a href="javascript:;"><i class="fa-solid fa-share-nodes"></i></a>
                            <a href="javascript:;"><i class="fa-solid fa-tag"></i></a>
                            <a href="javascript:;"><i class="fa-solid fa-ellipsis-vertical"></i></a>
                        </div>

                    </div>
                    <div class="comment_img_prof">
                        <div class="image-slider">
                            @foreach($promptGeneration->generatedImages as $image)
                                <div class="slider-item">
                                    <img src="{{ asset($image->image_url) }}" alt="Generated Image" class="slider-img">
                                </div>
                            @endforeach
                        </div>
                        <p>
                            <b>Prompt:</b> {{$promptGeneration->positive_prompt}}
                        </p>
                    </div>

                </div>
            </div>
            <div class="row">
                <div class="comment_row col-md-12">
                    <div class="total_comment">
                        <strong>Comment <span></span></strong>
                        <a class="cross_btn d-none"><i class="fa-solid fa-xmark"></i></a>
                    </div>
                    <div class="post_comment">
                        <a id="post_comment_achor" href="javascript:void(0);" class="trans_btn d-block text-center">Post A Comment</a>
                        <p></p>
                    </div>
                    <div class="create_comment">
                        <div class="comment_box d-flex">
                            <img src="{{$user_data['user_profile_picture']}}">
                            <div class="form-group">
                                <textarea required id="comment" name="comment" class="form-control" rows="5" placeholder="Write your comment here..."></textarea>
                            </div>
                        </div>
                        <div class="d-flex justify-content-between">
                            <div class="attached_file d-flex">
                                <a id="open_tab" href="javascript:void(0);"><i class="fa-solid fa-plus"></i></a>
                                <ul>
                                    <li>
                                        <a href="javascript:void(0);">
                                            <i class="fa-regular fa-image"></i>
                                            <input type="file" id="image_comment" accept="image/jpeg, image/png">
                                            <span class="counter img_counter">0</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0);">
                                            <i class="fa-solid fa-paperclip"></i>
                                            <input type="file" id="document_comment" accept=".doc,.docx,.pdf">
                                            <span class="counter doc_counter">0</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <div class="btn_row">
                                <a id="close_post_commnet" href="javascript:;" class="trans_btn">Cancel</a>
                                <a onclick="post_this_comment(this)" id="post_this_comment" href="javascript:void(0);" data-comment-id="" data-post-id="{{$id}}" data-parent-id="" data-sub-parent-id="" class="gradient_btn ml-2">Post</a>

                            </div>
                        </div>
                    </div>
                    <div class="relevent_cont">
                        <strong>All Comments</strong>
                        <div id="main_comments"></div>

                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="recommend_sec">
        <div class="container-fluid">
            <div class="col-12">
                <h3>Recommend To You</h3>
                <div class="recomended_blogs">
                    @for ($i=1;$i<6;$i++)
                        <div class="blog_box_recom">
                            <img src="{{asset('front/assets/img/blogs/'.$i.'.png')}}" class="recom_blog_img">
                            <div class="recom_cont">
                                <div class="recom_details">
                                    <h6>Sed Ut Perspiciatis Unde Omnis</h6>
                                    <div class="rec_prof d-flex">
                                        <img src="{{asset('front/assets/img/15.png')}}" class="">
                                        <span>John doe</span>
                                    </div>
                                </div>
                                <a class="view_more" href="javascript:;"><i class="fa-solid fa-plus"></i></a>
                            </div>
                        </div>
                    @endfor
                </div>
            </div>
        </div>
    </section>

    <script>

        const show_comments_by_pagination = async () => {

            const post_id = {{$id}};
            let main_comment = ``;
            let load_main_button = '';

            const comment_div = document.querySelector('#main_comments');

            try{
                const response = await axios.get(`{{route('comments.main')}}?page=1&post_id=${post_id}`);

                if(response.data){
                    const response_data = response.data.comments.data;
                    response_data.forEach((data) => {

                        main_comment += `
                        <div class="comment_div" data-set-id="${data.id}">
                            <div class="current_commen">
                                <div class="comment_prof">
                                    <img src="${data.user.user_picture}">
                                    <span>${data.user.name}</span>
                                    <div class="time">${data.time_ago}</div>
                                </div>
                                <div class="comment">${data.comment}</div>
                                `
                        if(data.attachment_type === 'image'){
                            main_comment +=`
                            <div class="image_comments">
                                <img src="/storage/${data.attachment}" alt="">
                            </div>
                            `;
                        }
                        if(data.attachment_type === 'docs'){
                            const splited_url = data.attachment.split('/');
                            main_comment +=`
                            <div class="docs_comments">
                                <a href="/storage/${data.attachment}"><i class="fa-solid fa-file"></i> ${splited_url[1]}</a>
                            </div>
                            `;
                        }
                        main_comment +=`
                                <div class="like_btns_row"> `;

                        if(data.comments_likes[0]){
                            if(data.comments_likes[0].liked === 'heart'){
                                main_comment +=`
                                 <a onclick="apply_likes(this)" class="linke_btn clicked_likes" data-comment-id="${data.id}" data-user-id="${data.comments_likes[0].user_id}" data-post-id="${data.post_id}" data-item-type="comments"><i class="fa-solid fa-thumbs-up"></i></a>
                            `;
                            } else{
                                main_comment +=`
                                 <a onclick="apply_likes(this)" class="linke_btn" data-comment-id="${data.id}" data-user-id="${data.comments_likes[0].user_id}" data-post-id="${data.post_id}" data-item-type="comments"><i class="fa-solid fa-thumbs-up"></i></a>
                            `;
                            }
                        }else{
                            main_comment +=`
                                 <a onclick="apply_likes(this)" class="linke_btn" data-comment-id="${data.id}" data-user-id="" data-post-id="${data.post_id}" data-item-type="comments"><i class="fa-solid fa-thumbs-up"></i></a>
                            `;
                        }

                        main_comment +=`
                                    <a onclick="post_comment('${data.id}','${data.parent_id}','${data.sub_parent_id}','${post_id}')" href="javascript:void(0);" class="reply_btn trans_btn">Reply</a>
                                    `;
                        if(data.replies_count != 0){
                            main_comment += `<a data-comment="${data.id}" onclick="show_replies(this, '${post_id}')" href="javascript:void(0);" class="reply_btn trans_btn">View replies</a>
                                        <img class="d-none loader" src="{{asset('/front/assets/img/spinners.gif')}}" alt="">`;
                        }
                        main_comment +=`
                                </div>
                            </div>`;
                        // if(data.replies_count != 0){
                        main_comment +=`
                              <div class="all_replies" data-child-set-id="${data.id}"></div>
                            `;
                        // }
                        main_comment +=`
                        </div>
                        `;


                    })

                    comment_div.innerHTML = main_comment;

                    document.querySelector('.total_comment span').innerHTML = '('+response.data.comments.total+')';

                    if(response.data.comments.next_page_url != null){
                        load_main_button = `
                        <a id="load_main_comments_btn" onclick="load_main_comments(this, '${response.data.comments.next_page_url}', '${post_id}' )" href="javascript:void(0);" class="trans_btn d-block text-center">Show more discussion (${response.data.comments.total})</a>
                    `;
                        comment_div.insertAdjacentHTML('afterend', load_main_button);
                    }

                }

            }catch (e){
                console.error(e)
            }

        }
        show_comments_by_pagination();


        const show_replies  = async (data, post_id) =>{


            const reply_btn = data;
            const parentDiv = reply_btn.closest('.comment_div');
            const comment_id = reply_btn.dataset.comment;
            const loaders  = reply_btn.nextElementSibling;
            const allRepliesDiv = parentDiv.querySelector('.all_replies');

            let child_comment = '';
            let load_more_button  = '';
            if (loaders && loaders.classList.contains('d-none')) {
                loaders.classList.remove('d-none');
                setTimeout(()=>{
                    loaders.classList.add('d-none');
                },1500)
            }

            setTimeout(async ()=>{
                try{
                    const response = await axios.get(`{{route('comments.child')}}?comment_id=${comment_id}`);

                    if(response.data){
                        const all_child_replies = response.data.replies.data;

                        all_child_replies.forEach((data)=>{
                            child_comment +=`
                            <div class="reply_comment" data-child-set-id="${data.id}">
                                <div class="comment_prof">
                                    <img src="${data.user.user_picture}">
                                    <span>${data.user.name}</span>
                                    <div class="time">${data.time_ago}</div>
                                </div>
                                <div class="comment">${data.comment}</div> `
                            if(data.attachment_type === 'image'){
                                child_comment +=`
                                    <div class="image_comments">
                                        <img src="/storage/${data.attachment}" alt="">
                                    </div>
                            `;
                            }
                            if(data.attachment_type === 'docs'){
                                const splited_url = data.attachment.split('/');
                                child_comment +=`
                                    <div class="docs_comments">
                                        <a href="/storage/${data.attachment}"><i class="fa-solid fa-file"></i> ${splited_url[1]}</a>
                                    </div>
                            `;
                            }
                            child_comment+=`
                                <div class="like_btns_row">`;

                            if(data.comments_likes[0]){
                                if(data.comments_likes[0].liked === 'heart'){
                                    child_comment +=`
                                 <a onclick="apply_likes(this)" class="linke_btn clicked_likes" data-comment-id="${data.id}" data-user-id="${data.comments_likes[0].user_id}" data-post-id="${data.post_id}" data-item-type="comments"><i class="fa-solid fa-thumbs-up"></i></a>
                            `;
                                } else{
                                    child_comment +=`
                                 <a onclick="apply_likes(this)" class="linke_btn" data-comment-id="${data.id}" data-user-id="${data.comments_likes[0].user_id}" data-post-id="${data.post_id}" data-item-type="comments"><i class="fa-solid fa-thumbs-up"></i></a>
                            `;
                                }
                            }else{
                                child_comment +=`
                                 <a onclick="apply_likes(this)" class="linke_btn" data-comment-id="${data.id}" data-user-id="" data-post-id="${data.post_id}" data-item-type="comments"><i class="fa-solid fa-thumbs-up"></i></a>
                            `;
                            }

                            child_comment +=`<a onclick="post_comment('${data.id}','${data.parent_id}','${data.sub_parent_id}','${post_id}')" href="javascript:;" class="reply_btn trans_btn">Reply</a>
                                </div>
                            </div>
                        `;
                        })
                        allRepliesDiv.innerHTML = child_comment;

                        if(response.data.replies.next_page_url != null){
                            const buttn_exits = allRepliesDiv.nextElementSibling;
                            if(buttn_exits){
                                buttn_exits.remove();
                            }
                            load_more_button =`
                                <a onclick="show_more_replies(this, '${response.data.replies.next_page_url}', '${comment_id}', this.closest('.comment_div'), '${post_id}')" href="javascript:void(0);" class="exits_btn trans_btn d-block text-center">Show More Replies</a>
                            `;
                            allRepliesDiv.insertAdjacentHTML('afterend', load_more_button);
                        }


                    }



                }catch (e){
                    console.error(e);
                }
            },1800);

        }

        const show_more_replies = async (data, replies, comment_id, main_div, post_id) => {

            const more_reply_btn = data;
            // const reply_btn = main_div;
            // const parentDiv = reply_btn.closest('.comment_div');
            const allRepliesDiv = main_div.querySelector('.all_replies');
            let child_comment = "";
            let load_more_button= '';
            try {
                const response = await axios.get(`${replies}&comment_id=${comment_id}`);
                if(response.data){
                    const all_child_replies = response.data.replies.data;
                    all_child_replies.forEach((data)=>{
                        child_comment +=`
                            <div class="reply_comment" data-child-set-id="${data.id}">
                                <div class="comment_prof">
                                    <img src="${data.user.user_picture}">
                                    <span>${data.user.name}</span>
                                    <div class="time">${data.time_ago}</div>
                                </div>
                                <div class="comment">${data.comment}</div>`;
                        if(data.attachment_type === 'image'){
                            child_comment +=`
                                    <div class="image_comments">
                                        <img src="/storage/${data.attachment}" alt="">
                                    </div>
                            `;
                        }
                        if(data.attachment_type === 'docs'){
                            const splited_url = data.attachment.split('/');
                            child_comment +=`
                                    <div class="docs_comments">
                                        <a href="/storage/${data.attachment}"><i class="fa-solid fa-file"></i> ${splited_url[1]}</a>
                                    </div>
                            `;
                        }
                        child_comment +=`
                                <div class="like_btns_row">`;

                        if(data.comments_likes[0]){
                            if(data.comments_likes[0].liked === 'heart'){
                                child_comment +=`
                                 <a onclick="apply_likes(this)" class="linke_btn clicked_likes" data-comment-id="${data.id}" data-user-id="${data.comments_likes[0].user_id}" data-post-id="${data.post_id}" data-item-type="comments"><i class="fa-solid fa-thumbs-up"></i></a>
                            `;
                            } else{
                                child_comment +=`
                                 <a onclick="apply_likes(this)" class="linke_btn" data-comment-id="${data.id}" data-user-id="${data.comments_likes[0].user_id}" data-post-id="${data.post_id}" data-item-type="comments"><i class="fa-solid fa-thumbs-up"></i></a>
                            `;
                            }
                        }else{
                            child_comment +=`
                                 <a onclick="apply_likes(this)" class="linke_btn" data-comment-id="${data.id}" data-user-id="" data-post-id="${data.post_id}" data-item-type="comments"><i class="fa-solid fa-thumbs-up"></i></a>
                            `;
                        }

                        child_comment +=`<a onclick="post_comment('${data.id}','${data.parent_id}','${data.sub_parent_id}','${post_id}')" href="javascript:;" class="reply_btn trans_btn">Reply</a>
                                </div>
                            </div>
                        `;
                    })
                    allRepliesDiv.insertAdjacentHTML('beforeend', child_comment);
                    more_reply_btn.remove();

                    if(response.data.replies.next_page_url != null){
                        load_more_button =`
                                <a onclick="show_more_replies(this, '${response.data.replies.next_page_url}', '${comment_id}', this.closest('.comment_div'), '${post_id}')" href="javascript:void(0);" class="exits_btn trans_btn d-block text-center">Show More Replies</a>
                            `;
                        allRepliesDiv.insertAdjacentHTML('afterend', load_more_button);
                    }

                }
            } catch (e) {
                console.log(e)
            }
        }

        const load_main_comments = async(data_btn, page_url, post_id) => {

            const Main_comment_div = document.querySelector('#main_comments');

            let main_comment = '';
            let load_main_button = '';

            try{
                const response = await axios.get(`${page_url}&post_id=${post_id}`);

                if(response.data){
                    const response_data = response.data.comments.data;
                    response_data.forEach((data) => {
                        main_comment += `
                        <div class="comment_div" data-set-id="${data.id}">
                            <div class="current_commen">
                                <div class="comment_prof">
                                    <img src="${data.user.user_picture}">
                                    <span>${data.user.name}</span>
                                    <div class="time">${data.time_ago}</div>
                                </div>
                                <div class="comment">${data.comment}</div> `;
                        if(data.attachment_type === 'image'){
                            main_comment +=`
                                <div class="image_comments">
                                    <img src="/storage/${data.attachment}" alt="">
                                </div>
                                `;
                        }
                        if(data.attachment_type === 'docs'){
                            const splited_url = data.attachment.split('/');
                            main_comment +=`
                                <div class="docs_comments">
                                    <a href="/storage/${data.attachment}"><i class="fa-solid fa-file"></i> ${splited_url[1]}</a>
                                </div>
                            `;
                        }
                        main_comment +=`
                                <div class="like_btns_row">`;

                        if(data.comments_likes[0]){
                            if(data.comments_likes[0].liked === 'heart'){
                                main_comment +=`
                                 <a onclick="apply_likes(this)" class="linke_btn clicked_likes" data-comment-id="${data.id}" data-user-id="${data.comments_likes[0].user_id}" data-post-id="${data.post_id}" data-item-type="comments"><i class="fa-solid fa-thumbs-up"></i></a>
                            `;
                            } else{
                                main_comment +=`
                                 <a onclick="apply_likes(this)" class="linke_btn" data-comment-id="${data.id}" data-user-id="${data.comments_likes[0].user_id}" data-post-id="${data.post_id}" data-item-type="comments"><i class="fa-solid fa-thumbs-up"></i></a>
                            `;
                            }
                        }else{
                            main_comment +=`
                                 <a onclick="apply_likes(this)" class="linke_btn" data-comment-id="${data.id}" data-user-id="" data-post-id="${data.post_id}" data-item-type="comments"><i class="fa-solid fa-thumbs-up"></i></a>
                            `;
                        }

                        main_comment +=`<a onclick="post_comment('${data.id}','${data.parent_id}','${data.sub_parent_id}','${post_id}')" href="javascript:;" class="reply_btn trans_btn">Reply</a>
                                    `;
                        if(data.replies_count != 0){
                            main_comment += `<a data-comment="${data.id}" onclick="show_replies(this, '${post_id}')" href="javascript:void(0);" class="reply_btn trans_btn">View replies</a>
                                        <img class="d-none loader" src="{{asset('/front/assets/img/spinners.gif')}}" alt="">`;
                        }
                        main_comment +=`
                                </div>
                            </div>`;
                        // if(data.replies_count != 0){
                        main_comment +=`
                              <div class="all_replies" data-child-set-id="${data.id}"></div>
                            `;
                        // }
                        main_comment +=`
                        </div>
                        `;


                    })

                    Main_comment_div.insertAdjacentHTML('beforeend', main_comment);

                    data_btn.remove();
                    if(response.data.comments.next_page_url != null){
                        load_main_button = `
                        <a id="load_main_comments_btn" onclick="load_main_comments(this, '${response.data.comments.next_page_url}', '${post_id}' )" href="javascript:void(0);" class="trans_btn d-block text-center">Show more discussion (${response.data.comments.total})</a>
                    `;
                        Main_comment_div.insertAdjacentHTML('afterend', load_main_button);
                    }

                }
            }catch (e) {
                console.log(e)
            }
        }



        let btn_post_comment = document.getElementsByClassName('create_comment');
        Array.from(btn_post_comment).forEach((btn) => {
            btn.style.display = 'none'; // Set initial display to none for all buttons
        });

        document.getElementById('post_comment_achor').addEventListener('click', () => {
            @if(Auth::check())
            Array.from(btn_post_comment).forEach((btn) => {
                if (btn.style.display === 'none') {
                    btn.style.display = 'block'; // Show the comment button
                } else {
                    document.getElementById('comment').value = '';
                    btn.style.display = 'none';

                    const btn_post = document.getElementById('post_this_comment');
                    btn_post.dataset.commentId = '' ;
                    btn_post.dataset.parentId = '';
                    btn_post.dataset.subParentId = '';
                }
            });
            @endif
        })
        document.getElementById('close_post_commnet').addEventListener('click', () => {
            Array.from(btn_post_comment).forEach((btn) => {
                if (btn.style.display === 'block') {
                    btn.style.display = 'none'; // Show the comment button
                    document.getElementById('comment').value = '';

                    const btn_post = document.getElementById('post_this_comment');
                    btn_post.dataset.commentId = '' ;
                    btn_post.dataset.parentId = '';
                    btn_post.dataset.subParentId = '';
                }
            });

        })




        @if(Auth::check())
        const post_comment = (comment_id, comment_parent_id, sub_parent_id, post_id) => {
            const btn_post = document.getElementById('post_this_comment');
            const post_comment_achor = document.getElementById('post_comment_achor');
            btn_post.dataset.commentId = comment_id ;
            btn_post.dataset.postId = post_id ;
            btn_post.dataset.parentId = comment_parent_id;
            btn_post.dataset.subParentId = sub_parent_id;

            Array.from(btn_post_comment).forEach((btn) => {
                btn.style.display = 'block'; // Set initial display to none for all buttons
            });
            post_comment_achor.scrollIntoView({
                behavior: 'smooth',
                block: 'start'
            });

        }
        const post_this_comment = async(data) => {
            const comment_id = data.dataset.commentId;
            const post_id = data.dataset.postId;
            const comment_parent_id = data.dataset.parentId;
            const sub_parent_id = data.dataset.subParentId;
            const message = document.getElementById('comment');
            const comment_image = document.getElementById('image_comment');
            const comment_document = document.getElementById('document_comment');
            const commentText = message.value.trim();

            if (!commentText) {
                // Show error message
                const errorMsg = document.getElementById('comment_error');
                if (!errorMsg) {
                    const errorElement = document.createElement('div');
                    errorElement.id = 'comment_error';
                    errorElement.className = 'text-danger';
                    errorElement.innerText = 'Please fill in the comment field.';
                    document.getElementById('comment').insertAdjacentElement('afterend', errorElement);
                }
                return; // Stop execution if comment is empty
            }
            else {
                // If there's no error, remove any existing error message
                const errorMsg = document.getElementById('comment_error');
                if (errorMsg) {
                    errorMsg.remove();
                }
            }

            const payload = new FormData;
            payload.append("comment_id", comment_id);
            payload.append("post_id", post_id);
            payload.append("comment_parent_id", comment_parent_id);
            payload.append("sub_parent_id", sub_parent_id);
            payload.append("comment", message.value);
            if(comment_image.files[0]) payload.append("comment_image", comment_image.files[0]);
            if(comment_document.files[0]) payload.append("comment_document", comment_document.files[0]);


            try{

                const response = await axios.post(`{{route('comments.insert')}}`, payload,{
                    headers: {
                        'content-type': 'multipart/form-data'
                    }
                })

                if(response.data){

                    insert_html_data(comment_id, comment_parent_id, sub_parent_id, response.data);

                    data.dataset.commentId = '';
                    data.dataset.parentId = '';
                    data.dataset.subParentId = '';

                    comment_image.value = '';
                    comment_document.value = '';
                    document.querySelector('.doc_counter').innerHTML = '0';
                    document.querySelector('.img_counter').innerHTML = '0';
                    message.value = '';

                }
            }catch (e) {
                console.log(e)
            }


        }
        @else
        document.querySelector('.post_comment p').innerHTML = "Please Login To Continue";
        @endif

        const open_tab = document.getElementById('open_tab');
        const docs =  document.getElementById('document_comment');
        const images = document.getElementById('image_comment');


        open_tab.addEventListener('click', ()=>{
            const toggle_tab = document.querySelector('.attached_file ul');
            const file_field = document.querySelector('.attached_file ul input');
            open_tab.classList.toggle('added')
            toggle_tab.classList.toggle('hidden');

            if(!open_tab.classList.contains('hidden') && file_field.value && file_field){
                file_field.value = '';
                document.querySelector('.doc_counter').innerHTML = '0';
                document.querySelector('.img_counter').innerHTML = '0';
            }else{
                docs.addEventListener('change', function () {
                    if (docs.files && docs.files[0]) {
                        document.querySelector('.doc_counter').innerHTML = '1';
                    }
                    if (images.files && images.files[0]) {
                        images.value = '';
                        document.querySelector('.img_counter').innerHTML = '0';
                    }
                });

                images.addEventListener('change', function () {
                    if (images.files && images.files[0]) {
                        document.querySelector('.img_counter').innerHTML = '1';
                    }
                    if (docs.files && docs.files[0]) {
                        docs.value = '';
                        document.querySelector('.doc_counter').innerHTML = '0';
                    }
                });
            }
        })

        const insert_html_data = (comment_id, parent_id, sub_parent_id, data)=>{
            const load_main_commens_btn = document.getElementById('load_main_comments_btn');
            const all_comments_data = data.comments;
            const comment_div = document.querySelector('#main_comments');
            let main_comment = '';

            if(!comment_id && !parent_id  && !sub_parent_id && load_main_commens_btn === null){

                main_comment += `
                        <div class="comment_div" data-set-id="${all_comments_data.id}">
                            <div class="current_commen">
                                <div class="comment_prof">
                                    <img src="${all_comments_data.user.user_picture}">
                                    <span>${all_comments_data.user.name}</span>
                                    <div class="time">${all_comments_data.time_ago}</div>
                                </div>
                                <div class="comment">${all_comments_data.comment}</div>
                                `
                if(all_comments_data.attachment_type === 'image'){
                    main_comment +=`
                            <div class="image_comments">
                                <img src="/storage/${all_comments_data.attachment}" alt="">
                            </div>
                            `;
                }
                if(all_comments_data.attachment_type === 'docs'){
                    const splited_url = all_comments_data.attachment.split('/');
                    main_comment +=`
                            <div class="docs_comments">
                                <a href="/storage/${all_comments_data.attachment}"><i class="fa-solid fa-file"></i> ${splited_url[1]}</a>
                            </div>
                            `;
                }
                main_comment +=`
                                <div class="like_btns_row">`;

                if(all_comments_data.comments_likes[0]){
                    if(all_comments_data.comments_likes[0].liked === 'heart'){
                        main_comment +=`
                                 <a onclick="apply_likes(this)" class="linke_btn clicked_likes" data-comment-id="${all_comments_data.id}" data-user-id="${all_comments_data.comments_likes[0].user_id}" data-post-id="${all_comments_data.post_id}" data-item-type="comments"><i class="fa-solid fa-thumbs-up"></i></a>
                            `;
                    } else{
                        main_comment +=`
                                 <a onclick="apply_likes(this)" class="linke_btn" data-comment-id="${all_comments_data.id}" data-user-id="${all_comments_data.comments_likes[0].user_id}" data-post-id="${all_comments_data.post_id}" data-item-type="comments"><i class="fa-solid fa-thumbs-up"></i></a>
                            `;
                    }
                }else{
                    main_comment +=`
                                 <a onclick="apply_likes(this)" class="linke_btn" data-comment-id="${all_comments_data.id}" data-user-id="" data-post-id="${all_comments_data.post_id}" data-item-type="comments"><i class="fa-solid fa-thumbs-up"></i></a>
                            `;
                }

                main_comment +=`<a onclick="post_comment('${all_comments_data.id}','${all_comments_data.parent_id}','${all_comments_data.sub_parent_id}','${all_comments_data.post_id}')" href="javascript:void(0);" class="reply_btn trans_btn">Reply</a>
                                    `;
                if(all_comments_data.replies_count != 0){
                    main_comment += `<a data-comment="${all_comments_data.id}" onclick="show_replies(this, '${all_comments_data.post_id}')" href="javascript:void(0);" class="reply_btn trans_btn">View replies</a>
                                        <img class="d-none loader" src="{{asset('/front/assets/img/spinners.gif')}}" alt="">`;
                }
                main_comment +=`
                                </div>
                            </div>`;
                // if(all_comments_data.replies_count != 0){
                    main_comment +=`
                              <div class="all_replies" data-child-set-id="${all_comments_data.id}"></div>
                            `;
                // }
                main_comment +=`
                        </div>
                        `;

                comment_div.insertAdjacentHTML('beforeend', main_comment);
            }
            if(comment_id && parent_id === "null"){
                const matching_div_comment = document.querySelector(`.comment_div[data-set-id="${comment_id}"]`);
                const load_more_btn = matching_div_comment.querySelector('.exits_btn');
                const matchingRepliesDiv = matching_div_comment.querySelector(`.all_replies[data-child-set-id="${comment_id}"]`);

                if(load_more_btn === null){
                    main_comment +=`
                            <div class="reply_comment" data-child-set-id="${all_comments_data.id}">
                                <div class="comment_prof">
                                    <img src="{{asset('front/assets/img/15.png')}}">
                                    <span>${all_comments_data.user.name}</span>
                                    <div class="time">${all_comments_data.time_ago}</div>
                                </div>
                                <div class="comment">${all_comments_data.comment}</div> `
                    if(all_comments_data.attachment_type === 'image'){
                        main_comment +=`
                                    <div class="image_comments">
                                        <img src="/storage/${all_comments_data.attachment}" alt="">
                                    </div>
                            `;
                    }
                    if(all_comments_data.attachment_type === 'docs'){
                        const splited_url = all_comments_data.attachment.split('/');
                        main_comment +=`
                                    <div class="docs_comments">
                                        <a href="/storage/${all_comments_data.attachment}"><i class="fa-solid fa-file"></i> ${splited_url[1]}</a>
                                    </div>
                            `;
                    }
                    main_comment+=`
                                <div class="like_btns_row">`;

                    if(all_comments_data.comments_likes[0]){
                        if(all_comments_data.comments_likes[0].liked === 'heart'){
                            main_comment +=`
                                 <a onclick="apply_likes(this)" class="linke_btn clicked_likes" data-comment-id="${all_comments_data.id}" data-user-id="${all_comments_data.comments_likes[0].user_id}" data-post-id="${all_comments_data.post_id}" data-item-type="comments"><i class="fa-solid fa-thumbs-up"></i></a>
                            `;
                        } else{
                            main_comment +=`
                                 <a onclick="apply_likes(this)" class="linke_btn" data-comment-id="${all_comments_data.id}" data-user-id="${all_comments_data.comments_likes[0].user_id}" data-post-id="${all_comments_data.post_id}" data-item-type="comments"><i class="fa-solid fa-thumbs-up"></i></a>
                            `;
                        }
                    }else{
                        main_comment +=`
                                 <a onclick="apply_likes(this)" class="linke_btn" data-comment-id="${all_comments_data.id}" data-user-id="" data-post-id="${all_comments_data.post_id}" data-item-type="comments"><i class="fa-solid fa-thumbs-up"></i></a>
                            `;
                    }

                    main_comment +=`<a onclick="post_comment('${all_comments_data.id}','${all_comments_data.parent_id}','${all_comments_data.sub_parent_id}','${all_comments_data.post_id}')" href="javascript:;" class="reply_btn trans_btn">Reply</a>
                                </div>
                            </div>
                        `;

                    matchingRepliesDiv.insertAdjacentHTML('beforeend', main_comment);

                }


            }
            else if(parent_id != comment_id){
                const matching_div_comment = document.querySelector(`.comment_div[data-set-id="${parent_id}"]`);
                const load_more_btn = matching_div_comment.querySelector('.exits_btn');
                const matchingRepliesDiv = matching_div_comment.querySelector(`.all_replies[data-child-set-id="${parent_id}"]`);

                if(load_more_btn === null){
                    main_comment +=`
                            <div class="reply_comment" data-child-set-id="${all_comments_data.id}">
                                <div class="comment_prof">
                                    <img src="{{asset('front/assets/img/15.png')}}">
                                    <span>${all_comments_data.user.name}</span>
                                    <div class="time">${all_comments_data.time_ago}</div>
                                </div>
                                <div class="comment">${all_comments_data.comment}</div> `
                    if(all_comments_data.attachment_type === 'image'){
                        main_comment +=`
                                    <div class="image_comments">
                                        <img src="/storage/${all_comments_data.attachment}" alt="">
                                    </div>
                            `;
                    }
                    if(all_comments_data.attachment_type === 'docs'){
                        const splited_url = all_comments_data.attachment.split('/');
                        main_comment +=`
                                    <div class="docs_comments">
                                        <a href="/storage/${all_comments_data.attachment}"><i class="fa-solid fa-file"></i> ${splited_url[1]}</a>
                                    </div>
                            `;
                    }
                    main_comment+=`
                                <div class="like_btns_row">`;

                    if(all_comments_data.comments_likes[0]){
                        if(all_comments_data.comments_likes[0].liked === 'heart'){
                            main_comment +=`
                                 <a onclick="apply_likes(this)" class="linke_btn clicked_likes" data-comment-id="${all_comments_data.id}" data-user-id="${all_comments_data.comments_likes[0].user_id}" data-post-id="${all_comments_data.post_id}" data-item-type="comments"><i class="fa-solid fa-thumbs-up"></i></a>
                            `;
                        } else{
                            main_comment +=`
                                 <a onclick="apply_likes(this)" class="linke_btn" data-comment-id="${all_comments_data.id}" data-user-id="${all_comments_data.comments_likes[0].user_id}" data-post-id="${all_comments_data.post_id}" data-item-type="comments"><i class="fa-solid fa-thumbs-up"></i></a>
                            `;
                        }
                    }else{
                        main_comment +=`
                                 <a onclick="apply_likes(this)" class="linke_btn" data-comment-id="${all_comments_data.id}" data-user-id="" data-post-id="${all_comments_data.post_id}" data-item-type="comments"><i class="fa-solid fa-thumbs-up"></i></a>
                            `;
                    }

                    main_comment +=`<a onclick="post_comment('${all_comments_data.id}','${all_comments_data.parent_id}','${all_comments_data.sub_parent_id}','${all_comments_data.post_id}')" href="javascript:;" class="reply_btn trans_btn">Reply</a>
                                </div>
                            </div>
                        `;

                    matchingRepliesDiv.insertAdjacentHTML('beforeend', main_comment);

                }


            }

        }



    </script>

    <script>


        const apply_likes = async (likes) => {
            const user_id  = likes.dataset.userId;
            const post_id  = likes.dataset.postId;
            const item_type  = likes.dataset.itemType;
            const comment_id  = likes.dataset.commentId;

            const payload = {
                'user_id': user_id,
                "post_id":post_id,
                "item_type": item_type,
                "comment_id": comment_id
            };
            const errors_messages = document.querySelector('.errors_messages p');

            try{
                const response  = await axios.post('{{route('comment.like')}}', payload);

                const get_class = likes.classList.contains('clicked_likes');
                if(response.data.liked === 'disheart'){
                    if(get_class){
                        likes.classList.remove('clicked_likes');
                    }
                }else if(response.data.liked === 'heart'){
                    if(!get_class){
                        likes.classList.add('clicked_likes');
                    }
                }

            }catch (error){
                document.querySelector('.post_comment p').innerHTML = "Please Login To Continue!!!";
            }

        }


    </script>
@endsection
