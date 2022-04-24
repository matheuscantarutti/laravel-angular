import { NgModule } from '@angular/core';
import { Routes, RouterModule } from '@angular/router';
import { AddIndicadoComponent } from 'src/app/components/add-indicado/add-indicado.component';
import { UpdateIndicadoComponent } from 'src/app/components/update-indicado/update-indicado.component';
import { IndicadosListComponent } from 'src/app/components/indicado-list/indicado-list.component';
const routes: Routes = [
  { path: '', pathMatch: 'full', redirectTo: 'indicados-list' },
  { path: 'add-indicado', component: AddIndicadoComponent },
  { path: 'update-indicado/:id', component: UpdateIndicadoComponent },
  { path: 'indicados-list', component: IndicadosListComponent },
];
@NgModule({
  imports: [RouterModule.forRoot(routes)],
  exports: [RouterModule],
})
export class AppRoutingModule {}
