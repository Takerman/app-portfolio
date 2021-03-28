using Cofoundry.Domain.Data;
using System;

namespace Tanyo.Portfolio.Web.Data
{
    public class CatLike
    {
        public int CatCustomEntityId { get; set; }

        public int UserId { get; set; }

        public DateTime CreateDate { get; set; }

        public virtual User User { get; set; }

        public virtual CustomEntity CatCustomEntity { get; set; }
    }
}