using System.Collections.Generic;
using Tanyo.Portfolio.Data.Entities;

namespace Tanyo.Portfolio.Web.Models
{
    public class PricingTableModel
    {
        private int employmentTypeId;

        public PricingTableModel(int employmentTypeId)
        {
            this.employmentTypeId = employmentTypeId;
            switch (this.employmentTypeId)
            {
                case 1:
                    PaymentPeriod = "Year";
                    break;

                case 2:
                    PaymentPeriod = "Day";
                    break;
            }
        }

        public List<Price> Prices { get; set; }

        public string PaymentPeriod { get; set; }
    }
}