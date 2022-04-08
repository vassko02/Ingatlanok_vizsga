import { NgModule } from '@angular/core';
import { RouterModule, Routes } from '@angular/router';
import { NewadComponent } from './newad/newad.component';
import { OffersComponent } from './offers/offers.component';
import { OpenpageComponent } from './openpage/openpage.component';

const routes: Routes = [ 
  {
    "path": "offers",
    "component": OffersComponent
  },  
  {
    "path": "newad",
    "component": NewadComponent
  },
  {
    "path": "**",
    "component": OpenpageComponent
  }
];

@NgModule({
  imports: [RouterModule.forRoot(routes)],
  exports: [RouterModule]
})
export class AppRoutingModule { }
