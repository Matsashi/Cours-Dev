import { ComponentFixture, TestBed } from '@angular/core/testing';

import { ExoRecapButtonComponent } from './exo-recap-button.component';

describe('ExoRecapButtonComponent', () => {
  let component: ExoRecapButtonComponent;
  let fixture: ComponentFixture<ExoRecapButtonComponent>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      declarations: [ ExoRecapButtonComponent ]
    })
    .compileComponents();
  });

  beforeEach(() => {
    fixture = TestBed.createComponent(ExoRecapButtonComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
