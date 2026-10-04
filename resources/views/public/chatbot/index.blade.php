@extends('layouts.public.app')

@section('title', 'Chatbot Investasi | KSPM STMIK Adhi Guna')

@section('content')

<style>

    .chatbot-wrapper {
        min-height: calc(100vh - 160px);
        background: #f8fafc;
    }

    .chatbot-container {
        max-width: 1000px;
        margin: auto;
    }

    .chatbot-card {
        height: 680px;
        border-radius: 24px;
        overflow: hidden;
        background: #ffffff;
    }

    .chatbot-header {
        background: linear-gradient(135deg, #0f3d2e, #176044);
    }

    .bot-avatar {
        width: 48px;
        height: 48px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        background: #d4af37;
        color: #0f3d2e;
        font-size: 1.4rem;
    }

    .chat-area {
        height: 470px;
        overflow-y: auto;
        background: #f8fafc;
    }

    .message {
        max-width: 75%;
        margin-bottom: 20px;
    }

    .message-bot {
        margin-right: auto;
    }

    .message-user {
        margin-left: auto;
    }

    .message-content {
        padding: 14px 18px;
        border-radius: 18px;
        line-height: 1.6;
    }

    .message-bot .message-content {
        background: #ffffff;
        border: 1px solid #e9ecef;
        border-top-left-radius: 5px;
    }

    .message-user .message-content {
        background: #0f3d2e;
        color: #ffffff;
        border-top-right-radius: 5px;
    }

    .quick-question {
        cursor: pointer;
        transition: .2s;
    }

    .quick-question:hover {
        transform: translateY(-2px);
        border-color: #0f3d2e !important;
    }

    .chat-input {
        border-radius: 14px;
        border: 1px solid #dee2e6;
    }

    .chat-input:focus {
        border-color: #0f3d2e;
        box-shadow: 0 0 0 .2rem rgba(15, 61, 46, .1);
    }

    .send-button {
        width: 50px;
        height: 50px;
        border-radius: 14px;
    }

    @media (max-width: 768px) {

        .chatbot-card {
            height: calc(100vh - 100px);
            border-radius: 0;
        }

        .chat-area {
            height: calc(100vh - 300px);
        }

        .message {
            max-width: 88%;
        }

    }

</style>


<!-- HEADER -->

<section class="py-4 text-white chatbot-header">

    <div class="container">

        <div class="d-flex align-items-center gap-3">

            <div class="bot-avatar">

                <i class="bi bi-robot"></i>

            </div>

            <div>

                <h1 class="h3 fw-bold mb-1">
                    Asisten Investasi KSPM
                </h1>

                <p class="mb-0 opacity-75">
                    Teman belajar investasi dan pasar modal
                </p>

            </div>

        </div>

    </div>

</section>


<!-- CHATBOT -->

<section class="chatbot-wrapper py-5">

    <div class="container chatbot-container">

        <div class="card chatbot-card border-0 shadow-lg">


            <!-- CHAT HEADER -->

            <div class="chatbot-header text-white p-3">

                <div class="d-flex align-items-center">

                    <div class="bot-avatar me-3">

                        <i class="bi bi-robot"></i>

                    </div>

                    <div>

                        <h6 class="fw-bold mb-1">
                            KSPM Assistant
                        </h6>

                        <small class="opacity-75">

                            <i class="bi bi-circle-fill text-success me-1"
                               style="font-size:8px;">
                            </i>

                            Online

                        </small>

                    </div>

                </div>

            </div>


            <!-- CHAT AREA -->

            <div class="chat-area p-4" id="chatArea">


                <!-- BOT MESSAGE -->

                <div class="message message-bot">

                    <div class="d-flex align-items-start gap-2">

                        <div
                            class="bot-avatar flex-shrink-0"
                            style="width:38px;height:38px;font-size:1rem;">

                            <i class="bi bi-robot"></i>

                        </div>


                        <div>

                            <small class="text-muted d-block mb-1">
                                KSPM Assistant
                            </small>

                            <div class="message-content">

                                Halo! 👋

                                <br><br>

                                Saya adalah <strong>KSPM Assistant</strong>.
                                Saya dapat membantu kamu memahami berbagai
                                informasi tentang investasi dan pasar modal.

                                <br><br>

                                Kamu bisa bertanya tentang:

                                <ul class="mb-0 mt-2">

                                    <li>Investasi untuk pemula</li>

                                    <li>Saham</li>

                                    <li>Pasar modal</li>

                                    <li>Investasi syariah</li>

                                    <li>Analisis saham</li>

                                    <li>Kegiatan KSPM</li>

                                </ul>

                            </div>

                        </div>

                    </div>

                </div>


                <!-- USER MESSAGE -->

                <div class="message message-user">

                    <div class="d-flex justify-content-end">

                        <div>

                            <small class="text-muted d-block mb-1 text-end">
                                Anda
                            </small>

                            <div class="message-content">

                                Apa itu investasi?

                            </div>

                        </div>

                    </div>

                </div>


                <!-- BOT RESPONSE -->

                <div class="message message-bot">

                    <div class="d-flex align-items-start gap-2">

                        <div
                            class="bot-avatar flex-shrink-0"
                            style="width:38px;height:38px;font-size:1rem;">

                            <i class="bi bi-robot"></i>

                        </div>

                        <div>

                            <small class="text-muted d-block mb-1">
                                KSPM Assistant
                            </small>

                            <div class="message-content">

                                Investasi adalah kegiatan menempatkan
                                sejumlah dana atau aset pada instrumen tertentu
                                dengan tujuan memperoleh keuntungan di masa
                                yang akan datang.

                                <br><br>

                                Contoh instrumen investasi antara lain saham,
                                obligasi, reksa dana, dan instrumen pasar modal
                                lainnya.

                            </div>

                        </div>

                    </div>

                </div>


            </div>


            <!-- QUICK QUESTIONS -->

            <div class="px-4 pt-3">

                <small class="text-muted fw-semibold d-block mb-2">

                    Pertanyaan cepat

                </small>


                <div class="d-flex gap-2 overflow-auto pb-2">

                    <button
                        type="button"
                        class="btn btn-sm btn-outline-success rounded-pill quick-question">

                        Apa itu saham?

                    </button>

                    <button
                        type="button"
                        class="btn btn-sm btn-outline-success rounded-pill quick-question">

                        Apa itu reksa dana?

                    </button>

                    <button
                        type="button"
                        class="btn btn-sm btn-outline-success rounded-pill quick-question">

                        Investasi syariah?

                    </button>

                    <button
                        type="button"
                        class="btn btn-sm btn-outline-success rounded-pill quick-question">

                        Cara mulai investasi?

                    </button>

                </div>

            </div>


            <!-- INPUT -->

            <div class="p-4 border-top">

                <form id="chatForm">

                    <div class="d-flex gap-2">

                        <input
                            type="text"
                            id="messageInput"
                            class="form-control chat-input"
                            placeholder="Ketik pertanyaan kamu..."
                            autocomplete="off"
                        >

                        <button
                            type="submit"
                            class="btn btn-success send-button">

                            <i class="bi bi-send-fill"></i>

                        </button>

                    </div>

                </form>


                <div class="text-center mt-2">

                    <small class="text-muted">

                        KSPM Assistant dapat membantu memberikan
                        informasi edukasi investasi.

                    </small>

                </div>

            </div>

        </div>

    </div>

</section>


<!-- JAVASCRIPT -->

<script>

    const chatForm = document.getElementById('chatForm');
    const messageInput = document.getElementById('messageInput');
    const chatArea = document.getElementById('chatArea');

    /*
    |--------------------------------------------------------------------------
    | Kirim Pesan
    |--------------------------------------------------------------------------
    */

    chatForm.addEventListener('submit', function(event) {

        event.preventDefault();

        const message = messageInput.value.trim();

        if (message === '') {
            return;
        }

        addUserMessage(message);

        messageInput.value = '';

        /*
        |--------------------------------------------------------------------------
        | Dummy Response
        |--------------------------------------------------------------------------
        */

        setTimeout(function() {

            addBotMessage(
                'Terima kasih atas pertanyaannya. Saat ini chatbot masih dalam tahap pengembangan. Nantinya pertanyaan kamu akan diproses oleh sistem AI KSPM.'
            );

        }, 700);

    });


    /*
    |--------------------------------------------------------------------------
    | Tambahkan Pesan User
    |--------------------------------------------------------------------------
    */

    function addUserMessage(message) {

        const wrapper = document.createElement('div');

        wrapper.className = 'message message-user';

        wrapper.innerHTML = `

            <div class="d-flex justify-content-end">

                <div>

                    <small class="text-muted d-block mb-1 text-end">
                        Anda
                    </small>

                    <div class="message-content">
                        ${escapeHtml(message)}
                    </div>

                </div>

            </div>

        `;

        chatArea.appendChild(wrapper);

        scrollChat();

    }


    /*
    |--------------------------------------------------------------------------
    | Tambahkan Pesan Bot
    |--------------------------------------------------------------------------
    */

    function addBotMessage(message) {

        const wrapper = document.createElement('div');

        wrapper.className = 'message message-bot';

        wrapper.innerHTML = `

            <div class="d-flex align-items-start gap-2">

                <div
                    class="bot-avatar flex-shrink-0"
                    style="width:38px;height:38px;font-size:1rem;">

                    <i class="bi bi-robot"></i>

                </div>

                <div>

                    <small class="text-muted d-block mb-1">
                        KSPM Assistant
                    </small>

                    <div class="message-content">

                        ${escapeHtml(message)}

                    </div>

                </div>

            </div>

        `;

        chatArea.appendChild(wrapper);

        scrollChat();

    }


    /*
    |--------------------------------------------------------------------------
    | Scroll otomatis
    |--------------------------------------------------------------------------
    */

    function scrollChat() {

        chatArea.scrollTop = chatArea.scrollHeight;

    }


    /*
    |--------------------------------------------------------------------------
    | Keamanan teks
    |--------------------------------------------------------------------------
    */

    function escapeHtml(text) {

        const div = document.createElement('div');

        div.textContent = text;

        return div.innerHTML;

    }


    /*
    |--------------------------------------------------------------------------
    | Quick Question
    |--------------------------------------------------------------------------
    */

    document.querySelectorAll('.quick-question').forEach(function(button) {

        button.addEventListener('click', function() {

            const question = this.textContent.trim();

            messageInput.value = question;

            messageInput.focus();

        });

    });

</script>

@endsection