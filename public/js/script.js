$(document).ready(() => {

  $('#dashboard').on('click', () => {
    $.get('/home', data => {
      $('#pagina').html(data);
    })
  })
  
  $('#documentacao').on('click', () => {
    $.get('/pages/documentacao.html', data => {
      $('#pagina').html(data);
    });
  })

  $('#suporte').on('click', () => {
    $.get('/pages/suporte.html', data => {
      $('#pagina').html(data);
    });
  })

  $('#competencia').on('change', e => {

    let competencia = $(e.target).val();
    
    $.ajax({
      type: 'GET',
      url: '/app',
      data: `competencia=${competencia}`,
      dataType: 'json',
      success: dados => {
        console.log(dados);

        $('#numeroVendas').html(dados.quantidadeVendas);
        $('#totalVendas').html('R$'+dados.totalVendas);
        $('#clientesAtivos').html(dados.clientesAtivos);
        $('#clientesInativos').html(dados.clientesInativos);
        $('#totalReclamacoes').html(dados.totalReclamacoes);
        $('#totalSugestoes').html(dados.totalSugestoes);
        $('#totalElogios').html(dados.totalElogios);
        $('#totalDespesas').html('R$'+dados.totalDespesas);
      },
      error: erro => {
        $('body').append(`
        <div class="modal fade" id="modalErro" tabindex="-1" role="dialog" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-danger">Erro ao requisitar dados</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                  </div>
              <div class="modal-body">
                OOPS! Ocorreu algum erro ao solicitar os dados. Tente novamente mais tarde.
                Erro: ${erro}
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Voltar</button>
              </div>
            </div>
          </div>
        </div>
        `);
        $(modalErro).modal('show');
        console.log(erro.responseText);
      }
    });
  })
})