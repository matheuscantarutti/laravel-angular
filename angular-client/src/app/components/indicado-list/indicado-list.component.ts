import { Component, OnInit } from '@angular/core';
import { IndicadoService } from 'src/app/indicado.service';
import { Indicado } from 'src/app/shared/indicado';

@Component({
  selector: 'app-indicado-list',
  templateUrl: './indicado-list.component.html',
  styleUrls: ['./indicado-list.component.css']
})
export class IndicadosListComponent implements OnInit {
  IndicadosList: any = [];
  enumStatus: any;

  ngOnInit() {
    this.loadIndicados();
  }
  constructor(
    public indicadoService: IndicadoService
  ) {

  }

  loadIndicados() {

    this.indicadoService.GetEnum('status-indicacao').subscribe(data => {

      return this.indicadoService.GetIndicados().subscribe((resp: any) => {
        this.enumStatus = data;

        this.IndicadosList = resp.data;

        this.IndicadosList.forEach((indicado: any) => {
          switch (indicado.status_indicacao) {
            case 1:
              indicado.desc_status = this.enumStatus.Iniciada.desc;
              break;
            case 2:
              indicado.desc_status = this.enumStatus.Em_processo.desc;
              break;
            case 3:
              indicado.desc_status = this.enumStatus.Finalizada.desc;
              break;
          }
        });
      })
    })
  }

  deleteIndicado(data: any) {
    var index: any = index = this.IndicadosList.map((x: any) => { return x }).indexOf(data.indicado_name);

    return this.indicadoService.DeleteIndicado(data.id).subscribe(res => {
      this.IndicadosList.splice(index, 1)
      this.loadIndicados();
    })
  }

  evoluirIndicado(indicado: Indicado) {

    switch (indicado.status_indicacao) {
      case this.enumStatus.Iniciada.num:
        indicado.status_indicacao = this.enumStatus.Em_processo.num
        break;
      case this.enumStatus.Em_processo.num:
        indicado.status_indicacao = this.enumStatus.Finalizada.num;
        break;
        default:
          return;
    }

    return this.indicadoService.EvoluiIndicado(indicado.id, indicado).subscribe(res => {
      this.loadIndicados();
    })
  }
}


