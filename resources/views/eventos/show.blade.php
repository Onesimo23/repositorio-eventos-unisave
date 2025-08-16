@extends('main')

@section('title', $evento->titulo)

@section('content')
<div class="container py-5">
    <!-- Header do Evento -->
    <div class="row mb-4">
        <div class="col-12">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="{{ route('home') }}" class="text-decoration-none">
                            <i class="fas fa-home me-1"></i>Home
                        </a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">{{ $evento->titulo }}</li>
                </ol>
            </nav>
        </div>
    </div>

    <div class="row">
        <!-- Coluna Principal - Conteúdo do Evento -->
        <div class="col-lg-8 mb-4">
            <!-- Card Principal do Evento -->
            <div class="card shadow-lg border-0 mb-4">
                @if($evento->imagem)
                <div class="position-relative">
                    <img src="{{ asset('storage/' . $evento->imagem) }}"
                        alt="{{ $evento->titulo }}"
                        class="card-img-top"
                        style="height: 350px; object-fit: cover;">

                    <!-- Badge de Status sobre a imagem -->
                    <div class="position-absolute top-0 end-0 m-3">
                        <span class="badge 
                            @if($evento->status == 'ativo') bg-success
                            @elseif($evento->status == 'cancelado') bg-danger
                            @elseif($evento->status == 'adiado') bg-warning text-dark
                            @else bg-secondary
                            @endif fs-6 px-3 py-2">
                            {{ ucfirst($evento->status) }}
                        </span>
                    </div>
                </div>
                @endif
                <br>
                <div class="card-body p-4">
                    <div class="d-flex justify-content-between align-items-start mb-3">
                        <h1 class="card-title display-5 fw-bold mb-0 text-primary">
                            {{ $evento->titulo }}
                        </h1>

                        @if($evento->categoria)
                        <span class="badge bg-primary-subtle text-primary fs-6 px-3 py-2">
                            {{ $evento->categoria->nome }}
                        </span>
                        @endif
                    </div>

                    <div class="mb-4">
                        <h3 class="h5 fw-semibold text-secondary mb-3">
                            <i class="fas fa-info-circle me-2"></i>Descrição
                        </h3>
                        <p class="text-muted lh-lg fs-6" style="text-align: justify;">
                            {{ $evento->descricao }}
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Sidebar - Informações do Evento -->
        <div class="col-lg-4">
            <!-- Card de Informações -->
            <div class="card shadow-sm border-0 sticky-top" style="top: 2rem;">
                <div class="card-header bg-primary text-white py-3">
                    <h5 class="mb-0 fw-semibold d-flex align-items-center">
                        <i class="fas fa-calendar-alt me-2"></i> 
                        .-Informações do Evento
                    </h5>
                </div>

                <div class="card-body p-4">
                    <!-- Data e Hora -->
                    <div class="mb-4">
                        <div class="d-flex align-items-start">
                            <div class="flex-grow-1">
                                <h6 class="mb-1 fw-semibold text-dark">Data & Hora</h6>
                                <p class="mb-0 text-muted">
                                    {{ \Carbon\Carbon::parse($evento->data)->translatedFormat('d \d\e F, Y') }}<br>
                                    <span class="fw-bold">{{ $evento->hora }}</span>
                                </p>
                            </div>
                        </div>
                    </div>

                    <!-- Local -->
                    <div class="mb-4">
                        <div class="d-flex align-items-start">
                            <div class="flex-grow-1">
                                <h6 class="mb-1 fw-semibold text-dark">Local</h6>
                                <p class="mb-0 text-muted">{{ $evento->local }}</p>
                            </div>
                        </div>
                    </div>

                    <!-- Organizador -->
                    <div class="mb-4">
                        <div class="d-flex align-items-start">
                            <div class="flex-grow-1">
                                <h6 class="mb-1 fw-semibold text-dark">Organizador</h6>
                                <p class="mb-0 text-muted">{{ $evento->organizador }}</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Ações -->
                <div class="card-footer bg-light border-0 p-4">
                    <div class="d-grid gap-4">

                        <!-- Botão Principal de Inscrição -->
                        <button class="btn btn-success btn-lg fw-semibold"
                            onclick="inscreverEvento()">
                            <i class="fas fa-user-plus me-2"></i>Inscrever-se no Evento
                        </button>
                        <br>
                        <hr>

                        <!-- Botões Secundários -->
                        <div class="row g-2">
                            <div class="col-6">
                                <button class="btn btn-outline-success w-100 d-flex align-items-center justify-content-center"
                                    onclick="compartilhar()" style="min-height: 42px;">
                                    <i class="fas fa-share-alt me-2"></i>Compartilhar
                                </button>
                            </div>
                            <div class="col-6">
                                <button class="btn btn-outline-info w-100 d-flex align-items-center justify-content-center"
                                    onclick="adicionarCalendario()" style="min-height: 42px;">
                                    <i class="fas fa-calendar-plus me-2"></i>Calendário
                                </button>
                            </div>

                        </div>
                        <br>
                        <hr>
                        <!-- Botão Voltar -->
                        <a href="{{ route('home') }}"
                            class="btn btn-outline-primary btn-lg">
                            <i class="fas fa-arrow-left me-2"></i>Voltar à Página Inicial
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Scripts para funcionalidades adicionais -->
<script>
    function compartilhar() {
        if (navigator.share) {
            navigator.share({
                title: '{{ $evento->titulo }}',
                text: '{{ $evento->descricao }}',
                url: window.location.href
            });
        } else {
            // Fallback para navegadores que não suportam Web Share API
            navigator.clipboard.writeText(window.location.href).then(function() {
                alert('Link copiado para a área de transferência!');
            });
        }
    }

    function inscreverEvento() {
        // Aqui você pode implementar a lógica de inscrição
        // Por exemplo, fazer uma requisição AJAX para o backend

        // Exemplo de implementação simples:
        if (confirm('Deseja se inscrever no evento "{{ $evento->titulo }}"?')) {
            // Aqui faria a requisição para o backend
            // fetch('/eventos/{{ $evento->id }}/inscricao', { method: 'POST' })

            // Por enquanto, apenas um alert de confirmação:
            alert('Inscrição realizada com sucesso! Você receberá mais informações por email.');

            // Opcional: desabilitar o botão após inscrição
            const btnInscricao = document.querySelector('button[onclick="inscreverEvento()"]');
            btnInscricao.innerHTML = '<i class="fas fa-check me-2"></i>Inscrito!';
            btnInscricao.classList.remove('btn-success');
            btnInscricao.classList.add('btn-secondary');
            btnInscricao.disabled = true;
        }
    }

    function adicionarCalendario() {
        const dataEvento = '{{ \Carbon\Carbon::parse($evento->data)->format("Ymd") }}';
        const horaEvento = '{{ str_replace(":", "", $evento->hora) }}00';
        const titulo = encodeURIComponent('{{ $evento->titulo }}');
        const descricao = encodeURIComponent('{{ $evento->descricao }}');
        const local = encodeURIComponent('{{ $evento->local }}');

        const googleCalendarUrl = `https://calendar.google.com/calendar/render?action=TEMPLATE&text=${titulo}&dates=${dataEvento}T${horaEvento}/${dataEvento}T${horaEvento}&details=${descricao}&location=${local}`;

        window.open(googleCalendarUrl, '_blank');
    }
</script>

@endsection