{include file="header.tpl"}

<div class="container">

    <div class="page-header">
        <h1>Socitação de Doação</h1>
        <p class="lead">Para efetuar uma solicitação Doação de Sangue, preencha as informações.</p>
    </div>
    
    
    <div class="row">
        <div class="col-md-4">
            <img src="{$requester_picture}" alt="Foto do perfil de {$requester_name}" class="img-thumbnail">
        </div>
    </div>

    <form action="request.php?action=submit" method="POST">
        <div class="row">
            <div class="col-md-4"><div class="form-group">
                    <label for="txtPaciente">Nome do Paciente</label>
                    <input type="text" class="form-control"  name="txtPaciente" required="required" placeholder="Nome do Paciente">
                </div>
            </div>
            <div class="col-md-4"><div class="form-group">
                    <label for="txtMensagem">Mensagem</label>
                    <input type="text" class="form-control" name="txtMensagem" placeholder="Mensagem">
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




        </div>

        <div class="row">
            <div class="col-md-4">
                <button type="submit" class="btn btn-primary">Solicitar</button>
            </div>
        </div>

    </form>
</div>

{include file="footer.tpl"}