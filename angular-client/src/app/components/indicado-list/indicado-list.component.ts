import { Component, OnInit } from '@angular/core';
import { IndicadoService } from 'src/app/indicado.service';

@Component({
  selector: 'app-indicado-list',
  templateUrl: './indicado-list.component.html',
  styleUrls: ['./indicado-list.component.css']
})
export class IndicadosListComponent implements OnInit {
  IndicadosList: any = [];

  ngOnInit() {
    this.loadIndicados();
  }
  constructor(
    public indicadoService: IndicadoService
  ){ }

   loadIndicados() {
    return this.indicadoService.GetIndicados().subscribe((resp: any) => {
      this.IndicadosList = resp.data;
    })
  }
    // Delete indicado
    deleteIndicado(data:any){
      var index:any = index = this.IndicadosList.map((x: any) => {return x}).indexOf(data.indicado_name);
       return this.indicadoService.DeleteIndicado(data.id).subscribe(res => {
        this.IndicadosList.splice(index, 1)
        this.loadIndicados();
       })
    }
}
