{include file="header.tpl"}

<link href="css/font-awesome.css" rel="stylesheet">
<link href="css/bootstrap-social.css" rel="stylesheet">

<div class="container">

    <div class="page-header">
        <h1>Socitação de Doação</h1>
        <p class="lead">Para efetuar uma solicitação Doação de Sangue, preencha as informações.</p>
    </div>


    <div class="row">
        <div class="col-md-4">
            <img src="{$requester_picture}" alt="Foto do perfil de {$requester_name}" class="img-thumbnail">
            <div id="fb-name"></div>
        </div>
    </div>

    <form action="request.php?action=submit" method="POST">
        <div class="row">

            <input type="hidden" name="hdnRequestId" value="{$requestId}" />
            <input type="hidden" name="hdnFaceId" value="" />

            <div class="col-md-4"><div class="form-group">
                    <label for="txtPaciente">Nome do Paciente</label>
                    <input type="text" class="form-control"  name="txtPaciente" required="required" placeholder="Nome do Paciente" value="{$nomePaciente}">
                </div>
            </div>   
            <div class="col-md-4"><div class="form-group">
                    <label for="cbxLocal">Local da Doação</label>
                    <select name="cbxLocal" class="form-control" required="required">
                        <option>Selecione um Local</option>
                        {html_options options=$local_options selected=$optionLocal_selected}
                    </select>
                </div>
            </div>   
            <div class="col-md-4"><div class="form-group">
                    <label for="cbxTipoSangue">Tipo sanguineo</label>
                    <select name="cbxTipoSangue" class="form-control" required="required">
                        <option>Selecione um Tipo Sanguineo</option>
                        {html_options options=$sangue_options selected=$optionSangue_selected}
                    </select>
                </div>
            </div>

            <div class="col-md-4"><div class="form-group">
                    <label for="txtMensagem">Mensagem</label>
                    <input type="text" class="form-control" name="txtMensagem" placeholder="Mensagem" value="{$mensagem}">
                </div>
            </div>         




        </div>

        {if $requestId > 0}

            <div class="row">
                <div class="col-md-4">
                    <a class="btn btn-block btn-social btn-facebook" id="btn-share">
                        <i class="fa fa-facebook"></i> Compartilhar no Facebook
                    </a>
                </div>
            </div>
        {else}
            <div class="row">
                <div class="col-md-4">
                    <button type="submit" class="btn btn-primary">Solicitar</button>
                </div>
            </div>
        {/if}

    </form>

    <a class="btn btn-block btn-social btn-facebook" id="btn-logout">
        <i class="fa fa-facebook"></i> Logout
    </a>

    <script src="js/request.js" ></script>
</div>

{include file="footer.tpl"}